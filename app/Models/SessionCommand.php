<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SessionCommand extends Model
{
    //
    protected $fillable = [
        'remote_session_id',
        'command',
        'status',
        'sent_at',
        'executed_at',
        'completed_at',
        'output',
        'execution_time',
    ];

    protected $casts = [
        'sent_at' => 'datetime',
        'executed_at' => 'datetime',
        'completed_at' => 'datetime',
        'execution_time' => 'float',
    ];


    protected $attributes = [
        'status' => 'pending'
    ];

    public function remote_session()
    {
        return $this->belongsTo(RemoteSession::class, 'remote_session_id');
    }

}
