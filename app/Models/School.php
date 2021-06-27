<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'abbr', 'name'
    ];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
