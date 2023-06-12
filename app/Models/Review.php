<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id', 'food_id','comment', 'photo', 'rating', 'is_aktif'
    ];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function user()
    {
       return $this->hasOne(User::class, 'id', 'users_id');
    }
    
}
