<?php

namespace App\Models;

use App\Models\User;
use App\Models\EventGallery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'users_id', 'event_name', 'event_desc_id', 'event_desc_en', 'date_start', 'date_end',  'address', 'address_link', 'slug'
    ];

    public function event_galleries(){
        return $this->hasMany(EventGallery::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class, 'users_id');
    }

}
