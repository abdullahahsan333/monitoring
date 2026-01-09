<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitor extends Model
{
    use HasFactory;

    protected $table = 'monitors';

    protected $fillable = [
        'user_id',
        'name',
        'type',
        'url',
        'interval_seconds',
        'port',
        'keyword',
        'expected_status_code',
        'is_active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function checkLogs()
    {
        return $this->hasMany(CheckLog::class);
    }

    
}