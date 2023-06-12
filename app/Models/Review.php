<?php

namespace App\Models;

use App\Models\User;
use App\Models\Culiner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id', 'culiner_id','comment', 'photo', 'rating', 'is_aktif'
    ];

    public function culiner()
    {
        return $this->belongsTo(Culiner::class);
    }

    public function user()
    {
       return $this->hasOne(User::class, 'id', 'users_id');
    }
    
}
