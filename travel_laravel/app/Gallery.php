<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// nambahin soft delete
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes; //cara pakai soft deletenya

    //menambahkan fill abele / massasign [sesuai database yang dah dibikin]

    protected $fillable = [
        'travel_packages_id', 'image',
    ];
    protected $hidden = [];

    public function travel_package()
    {
        return $this->belongsTo(TravelPackage::class, 'travel_packages_id', 'id');
    }
}