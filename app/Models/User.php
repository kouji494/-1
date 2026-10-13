<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // 一括登録を許可する項目
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // 外部に表示しない項目
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // データの型変換
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
