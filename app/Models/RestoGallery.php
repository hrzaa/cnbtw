<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestoGallery extends Model
{
    use HasFactory;

     protected $fillable = [
        'photos', 'resto_id'
    ];

    public function resto()
    {
        return $this->belongsTo(Resto::class);
    }
    
}
