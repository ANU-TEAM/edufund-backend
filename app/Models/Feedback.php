<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    public function resolve()
    {
        $this->resolved = 1;
        return $this->save();
    }

    public function unresolve()
    {
        $this->resolved = 0;
        return $this->save();
    }
}
