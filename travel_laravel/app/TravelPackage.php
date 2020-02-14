<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// nambahin soft delete
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelPackage extends Model
{
    use SoftDeletes; //cara pakai soft deletenya

    //menambahkan fill abele / massasign [sesuai database yang dah dibikin]

    protected $fillable = [
        'title', 'slug', 'location', 'about', 'featured_event', 'language', 'foods', 'departure_date', 'duration', 'type', 'price'
    ];
    protected $hidden = [];

    public function galleries()
    {
        return  $this->hasMany(Gallery::class, 'travel_packages_id', 'id');
    }
}