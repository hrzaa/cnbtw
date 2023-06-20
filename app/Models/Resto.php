<?php

namespace App\Models;

use App\Models\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resto extends Model
{
    use HasFactory;

    protected $fillable =[
        'resto_name', 'users_id', 'culiner_id', 'price', 'resto_desc_id', 'resto_desc_en', 'address', 'address_link', 'slug'
    ];

    public function culiner()
    {
        return $this->belongsTo(Culiner::class);
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'users_id');
    }

    public function resto_galleries(){
        return $this->hasMany(RestoGallery::class);
    }

     public function culiners()
    {
       return $this->belongsToMany(Culiner::class, 'culiner_resto', 'resto_id', 'culiner_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
}
