<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payload extends Model
{
    //
    protecte $fillable =[
        'name',
        'os_type',
        'payload_type',
        'payload_code',
        'category',
    ];

}
