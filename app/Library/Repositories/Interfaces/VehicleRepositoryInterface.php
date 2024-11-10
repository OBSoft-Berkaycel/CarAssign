<?php
namespace App\Library\Repositories\Interfaces;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface VehicleRepositoryInterface
{
    public function getAll(): Collection|User;
    public function getById(int $vehicleId): Collection|User;
}