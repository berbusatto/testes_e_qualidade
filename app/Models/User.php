<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'username',
        'email',
        'password',
    ];
    protected $guarded = [

    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $visible = [
        //
    ];


    protected $casts = [
        'email_verified_at' => 'date:d/m/y',
        'deleted_at' => 'date:d/m/y',
        'created_at' => 'date:d/m/y',
        'updated_at'  => 'date:d/m/y',
        'is_blocked' => 'boolean'
    ];
}
