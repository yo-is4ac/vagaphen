<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'company_id',
        'code',
        'role',
        'description',
        'local'
    ];

    public function applications() {
        return $this->hasMany(Application::class);
    }
}
