<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'brand_id', 'category_id', 'series', 'model', 'color', 
        'power', 'year', 'gear', 'fuel'
    ];

    public function category()
    {
        return $this->belongsTo(VehicleCategories::class, 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(VehicleBrands::class, 'brand_id');
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_vehicles')
                    ->using(CompanyVehicle::class)
                    ->withPivot('quantity', 'in_stock')
                    ->withTimestamps();
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
}
