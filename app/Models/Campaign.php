<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'target_os',
        'status',
        'notes'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function remote_sessions()
    {
        return $this->hasMany(RemoteSession::class, 'campaign_id');
    }

    public function getActiveSessionCount()
    {
        return $this->remote_sessions()->where('status', 'active')->count();
    }

    public function getTotalSessionCount()
    {
        return $this->remote_sessions->count();
    }
}
