<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckLog extends Model
{
    protected $table = 'check_logs';

    // Tell Laravel this is the "created at" column
    const CREATED_AT = 'checked_at';

    // If you also have updated_at and don't want to use it:
    const UPDATED_AT = null; // or keep if you have it

    protected $fillable = [
        'monitor_id',
        'checked_at',
        'status',
        'response_time_ms',
        'http_status_code',
        'error_message',
    ];

    public function monitor()
    {
        return $this->belongsTo(Monitor::class);
    }
}