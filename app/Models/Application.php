<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'image_url', 'target_amount', 'user_id', 'category_id'
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function approve()
    {
        $this->approved = 1;
        return $this->save();
    }

    public function reject()
    {
        $this->approved = 0;
        return $this->save();
    }
}
