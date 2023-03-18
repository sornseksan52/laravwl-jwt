<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class reward extends Model
{
    //
    protected $fillable = [
        'name',
        'game_item_id',
        'chance',
        'stock'
    ];

    protected $hidden = [
        // 'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

}
