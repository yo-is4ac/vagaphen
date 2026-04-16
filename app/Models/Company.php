<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Company extends Authenticatable
{
    use HasApiTokens;

    protected $table = 'companies';
    protected $fillable = [
        'name',
        'email',
        'password'
    ];
    protected $casts = [
        'password' => 'hashed',
    ];
}
