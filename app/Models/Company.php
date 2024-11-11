<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class, 'company_vehicles')
                    ->using(CompanyVehicle::class)
                    ->withPivot('quantity', 'in_stock')
                    ->withTimestamps();
    }
}
