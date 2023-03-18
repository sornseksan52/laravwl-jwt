<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rewardLog extends Model
{
    //
    protected $fillable = [
        'name',
        'game_item_id',
        'chance',
        'qty'
    ];

    protected $hidden = [
        // 'password',
        'remember_token',
        'created_at',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

}
