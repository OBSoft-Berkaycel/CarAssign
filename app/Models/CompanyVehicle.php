<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyVehicle extends Model
{
    protected $table = 'company_vehicles';

    protected $fillable = ['company_id', 'vehicle_id', 'quantity', 'in_stock'];

    public $incrementing = false;
    protected $primaryKey = null;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
