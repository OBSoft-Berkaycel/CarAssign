<?php
namespace App\Library\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface VehicleRepositoryInterface
{
    public function getAll(): Collection;
    public function getById(int $vehicleId): Collection;
}