<?php
namespace App\Library\Services\Interfaces;

use App\Http\Requests\Assignment\ListByIdRequest;
use App\Http\Requests\Assignment\VehicleAssignmentDetailsRequest;
use Illuminate\Database\Eloquent\Collection;

interface AssignmentServiceInterface
{
    public function getAssignmentDetailsById(ListByIdRequest $request): Collection;
    public function getSelfAssignments(): Collection;
    public function getVehicleAssignmentDetails(VehicleAssignmentDetailsRequest $request):Collection;
}