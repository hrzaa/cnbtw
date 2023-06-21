<?php

namespace App\Models;

use App\Models\User;
use App\Models\Resto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id', 'resto_id','comment', 'photo', 'rating', 'is_aktif'
    ];
    
    public function resto()
    {
        return $this->belongsTo(Resto::class);
    }

    public function user()
    {
       return $this->hasOne(User::class, 'id', 'users_id');
    }
    
}
