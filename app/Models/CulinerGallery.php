<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CulinerGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'photos', 'culiner_id'
    ];

    public function culiner()
    {
        return $this->belongsTo(Culiner::class);
    }
}
