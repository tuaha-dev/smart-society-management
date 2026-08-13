<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // Tell Laravel your primary key name from the database migration
    protected $primaryKey = 'user_id';

    // Allow these fields to be filled
    protected $fillable = [
        'username',
        'password',
        'role',
    ];

    // Hide password when printing user data
    protected $hidden = [
        'password',
        'remember_token',
    ];
}