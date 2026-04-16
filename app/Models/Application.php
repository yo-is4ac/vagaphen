<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'position_id',
        'resume_path',
        'status'
    ];
}
