<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // ✅ Ép Laravel hiểu bảng là 'user' thay vì mặc định 'users'

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'avatar',
        'address',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
