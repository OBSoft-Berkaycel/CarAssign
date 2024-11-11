<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleBrands extends Model
{
    protected $fillable = ['name'];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'brand_id');
    }
}
