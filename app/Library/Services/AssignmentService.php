<?php
namespace App\Library\Services;

use App\Http\Requests\Assignment\ListByIdRequest;
use App\Http\Requests\Assignment\VehicleAssignmentDetailsRequest;
use App\Library\Services\Interfaces\AssignmentServiceInterface;
use App\Models\Assignment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class AssignmentService implements AssignmentServiceInterface
{

    public function getAssignmentDetailsById(ListByIdRequest $request): Collection
    {
        return Assignment::with('vehicle')->where('id', $request->get('assignment_id'))->get();
    }

    public function getSelfAssignments(): Collection
    {
        return Assignment::with('vehicle')->where('user_id',Auth::id())->get();
    }

    public function getVehicleAssignmentDetails(VehicleAssignmentDetailsRequest $request): Collection
    {
        return Assignment::with('vehicle')->where('vehicle_id',$request->get('vehicle_id'))->where('user_id',Auth::id())->get();
    }
}
