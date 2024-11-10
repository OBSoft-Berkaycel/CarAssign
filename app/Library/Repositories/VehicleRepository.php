<?php
namespace App\Library\Repositories;

use App\Library\Repositories\Interfaces\VehicleRepositoryInterface;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Collection;

class VehicleRepository implements VehicleRepositoryInterface
{
    public function getAll(): Collection|User
    {
        return Vehicle::all();
    }

    public function getById(int $vehicleId): Collection|User
    {
        return Vehicle::find($vehicleId);
    }

}
