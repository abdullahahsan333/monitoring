<?php

namespace App\Http\Controllers;

use App\Models\Monitor;
use App\Models\CheckLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MonitoringController extends Controller
{
    public function index()
    {
        $monitors = Auth::user()->monitors()->latest()->get();

        // For each monitor, compute basic dynamic data (status, uptime, etc.)
        $monitors->each(function ($monitor) {
            $lastCheck = $monitor->checkLogs()->latest()->first();
            $monitor->current_status = $lastCheck ? ($lastCheck->status ? 'Up' : 'Down') : 'Not started';
            $monitor->last_check_time = $lastCheck ? $lastCheck->checked_at->diffForHumans() : '-';
            
            // Uptime last 24h (simple calc)
            $checks24h = $monitor->checkLogs()->where('checked_at', '>=', Carbon::now()->subDay())->get();
            $total24h = $checks24h->count();
            $up24h = $checks24h->where('status', 1)->count();
            $monitor->uptime_24h = $total24h ? round(($up24h / $total24h) * 100, 2) : 100;
            $monitor->uptimeBars = $this->getUptimeBars($monitor, 24);
            // Average response time (last 24h)
            $monitor->avg_response_ms = $checks24h->avg('response_time_ms') ?? '-';
        });

        return view('monitoring.index', compact('monitors'));
    }

    public function create()
    {
        return view('monitoring.create');
    }

    public function store(Request $request)
    {
        // 1. Validate the incoming data
        $validated = $request->validate([
            'url'              => 'required|url|max:255',
            'interval'         => 'required|string|in:30s,1m,5m,10m,30m,1h,12h,24h', // add allowed values
            'request_timeout'  => 'nullable|string|in:5s,10s,15s,30s,45s,60s',
            'method'           => 'nullable|in:GET,HEAD,POST,PUT,DELETE',
            'monitor_type'     => 'required|in:http,keyword,ping,port', // from hidden input
            // Add more fields as needed (keyword, port, expected_status_code, etc.)
        ]);

        // 2. Convert interval string → seconds
        $intervalSeconds = $this->convertIntervalToSeconds($validated['interval']);

        // 3. Create the monitor
        $monitor = Monitor::create([
            'user_id'              => Auth::id(),
            'name'                 => parse_url($validated['url'], PHP_URL_HOST) ?: 'Monitor for ' . $validated['url'],
            'type'                 => $request->input('monitor_type', 'http'), // from hidden field
            'url'                  => $validated['url'],
            'interval_seconds'     => $intervalSeconds,
            'request_timeout'      => $this->convertIntervalToSeconds($validated['request_timeout'] ?? '30s'),
            'http_method'          => $validated['method'] ?? 'GET', // if you have this column
            'expected_status_code' => 200, // default - add field later if needed
            'is_active'            => 1,
            'created_at'           => now(),
            'updated_at'           => now(),
        ]);

        // 4. Redirect with success message
        return redirect()
            ->route('monitoring.index')
            ->with('success', 'Monitor created successfully! It will start checking soon.');
    }

    public function show(Monitor $monitor)
    {
        if ($monitor->user_id !== Auth::id()) {
            abort(403);
        }

        // Last check
        $lastCheck = $monitor->checkLogs()->latest()->first();
        $currentStatus = $lastCheck ? ($lastCheck->status ? 'Up' : 'Down') : 'Not started';
        $lastCheckTime = $lastCheck ? $lastCheck->checked_at->diffForHumans() : '-';
        $uptimeSince = $lastCheck ? $lastCheck->checked_at->diffForHumans() : '-'; // Simplify

        // Uptime calculations
        $uptime24h = $this->calculateUptime($monitor, '24h');
        $uptime7d = $this->calculateUptime($monitor, '7d');
        $uptime30d = $this->calculateUptime($monitor, '30d');

        // 24h uptime bars (divide into 24 hourly segments)
        $uptimeBars = $this->getUptimeBars($monitor, 24); // Array of 'up' or 'down' for each hour

        // Response time chart data (last 10 checks for example)
        $recentChecks = $monitor->checkLogs()->latest()->take(10)->get()->reverse();
        $chartLabels = $recentChecks->pluck('checked_at')->map(fn($date) => $date->format('M j, H:i'));
        $chartData = $recentChecks->pluck('response_time_ms');

        // Response stats (last 24h)
        $checks24h = $monitor->checkLogs()->where('checked_at', '>=', Carbon::now()->subDay())->get();
        $avgResponse = $checks24h->avg('response_time_ms') ?? '-';
        $minResponse = $checks24h->min('response_time_ms') ?? '-';
        $maxResponse = $checks24h->max('response_time_ms') ?? '-';

        // Incidents (simple: count groups of consecutive downs; or use incidents table if populated)
        $incidents = []; // Fetch from incidents table or calculate

        return view('monitoring.show', compact(
            'monitor', 'currentStatus', 'uptimeSince', 'lastCheckTime',
            'uptime24h', 'uptime7d', 'uptime30d', 'uptimeBars',
            'chartLabels', 'chartData', 'avgResponse', 'minResponse', 'maxResponse',
            'incidents'
        ));
    }

    // Helper: Convert '5m' to 300 seconds
    private function convertIntervalToSeconds($interval)
    {
        $num = (int) rtrim($interval, 'smh');
        $unit = substr($interval, -1);
        return match($unit) {
            's' => $num,
            'm' => $num * 60,
            'h' => $num * 3600,
            default => 300, // Default 5m
        };
    }

    // Helper: Calculate uptime percentage for period ('24h', '7d', '30d')
    private function calculateUptime($monitor, $period)
    {
        $start = match($period) {
            '24h' => Carbon::now()->subDay(),
            '7d' => Carbon::now()->subWeek(),
            '30d' => Carbon::now()->subMonth(),
            default => Carbon::now()->subDay(),
        };

        $checks = $monitor->checkLogs()->where('checked_at', '>=', $start)->get();
        $total = $checks->count();
        $up = $checks->where('status', 1)->count();

        return $total ? round(($up / $total) * 100, 2) : 100;
    }

    // Helper: Get array for 24h uptime bars (1 per hour, 'up' if >50% up in hour)
    private function getUptimeBars($monitor, $hours = 24)
    {
        $bars = [];
        $now = Carbon::now();

        // $results = DB::select("
        //         SELECT 
        //             DATE_FORMAT(checked_at, '%Y-%m-%d %H:00:00') as hour,
        //             MIN(id) as id,
        //             MAX(status) as status
        //         FROM `check_logs`
        //         WHERE `monitor_id` = ? 
        //         AND `checked_at` >= ?
        //         GROUP BY `hour` 
        //         ORDER BY `hour` ASC
        //     ", [$monitor->id, Carbon::now()->subHours(24)]);

        $results = DB::table('check_logs')
        ->select(
            DB::raw("DATE_FORMAT(checked_at, '%Y-%m-%d %H:00:00') as hour"),
            DB::raw('MIN(id) as id'), // or use another aggregate function
            'status' // This might need aggregation too
        )
        ->where('monitor_id', $monitor->id)
        ->where('status', 0)
        ->where('checked_at', '>=', Carbon::now()->subHours(24))
        ->groupBy('hour', 'status') // Add status to GROUP BY
        ->orderBy('hour', 'asc')
        ->get();
            
        for($i=Carbon::now()->subHours(24); $i<=Carbon::now(); $i->addHour()) {
           $hourKey = $i->format('Y-m-d H:00:00');
           
            $hourData = $results->firstWhere('hour', $hourKey);

            if ($hourData) {
                $bars[] = $hourData->status == 0 ? 'red-500' : 'green-500';
            } else {
                $bars[] = 'green-500'; // No data means 'up'
            }
        }

        return $bars;

        return array_reverse($bars); // newest hour on the right
    }
}