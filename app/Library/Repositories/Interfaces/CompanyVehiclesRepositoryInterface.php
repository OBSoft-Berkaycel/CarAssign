<?php
namespace App\Library\Repositories\Interfaces;

use App\Http\Requests\CompanyVehicles\ListByIdRequest;
use App\Models\CompanyVehicle;
use Illuminate\Database\Eloquent\Collection;

interface CompanyVehiclesRepositoryInterface
{
    public function getAll(): Collection|CompanyVehicle;
    public function getById(ListByIdRequest $request): Collection|CompanyVehicle;
}