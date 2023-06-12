<?php

namespace App\Models;

use App\Models\User;
use App\Models\Resto;
use App\Models\Review;
use App\Models\Category;
use App\Models\CulinerGallery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Culiner extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id','categories_id','culiner_name', 'culiner_desc_id', 'culiner_history_id', 'culiner_desc_en', 'culiner_history_en',  'slug'
    ];
    
    public function resto()
    {
        return $this->hasMany(Resto::class);
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'users_id');
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }

    public function restos()
    {
        return $this->belongsToMany(Resto::class);
    }

    public function culiner_galleries()
    {
        return $this->hasMany(CulinerGallery::class);
    }

   public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
}
