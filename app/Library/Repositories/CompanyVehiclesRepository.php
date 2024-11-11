<?php
namespace App\Library\Repositories;

use App\Http\Requests\CompanyVehicles\ListByIdRequest;
use App\Library\Repositories\Interfaces\CompanyVehiclesRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use App\Models\CompanyVehicle;
use Illuminate\Support\Facades\Auth;

class CompanyVehiclesRepository implements CompanyVehiclesRepositoryInterface
{
    public function getAll(): Collection|CompanyVehicle
    {
        return CompanyVehicle::where('company_id',Auth::user()->company_id)->get();
    }

    public function getById(ListByIdRequest $request): Collection|CompanyVehicle
    {
        return CompanyVehicle::where('company_id',Auth::user()->company_id)->where('vehicle_id',$request->get('vehicle_id'))->get();
    }
}
