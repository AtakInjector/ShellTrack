<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RemoteSession extends Model
{
    protected $fillable = [
        'name',
        'campaign_id',
        'os',
        'architecture',
        'listen_ip',
        'listen_port',
        'status',
        'payload_type',
        'first_seen',
        'last_checkin',
        'connection_count',
        'victim_ip',
        'vicim_hostname',
        'victum_user',
        'notes'
    ];

    protected $casts = [
        'last_checkin' => 'datetime',
        'first_seen' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'connection_count' => 'integer',
        'listen_port' => 'integer'
    ];

    protected static function booted()
    {

        static::creating(function($remote_session){
            if (empty($remote_session->session_token)){
                $remote_session->session = Str::random(32);
            }

            if(empty($remote_session->first_seen)){
                $remote_session->first_seen = now();
            }
        });
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class, 'campaign_id');
    }

    public function session_commands()
    {
        return $this->hasMany(SessionCommand::class, 'remote_session_id')
    }

}
