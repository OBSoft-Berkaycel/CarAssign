<?php
namespace App\Library\Services;

use App\Http\Requests\Assignment\ListByIdRequest;
use App\Library\Services\Interfaces\AssignmentServiceInterface;
use App\Models\Assignment;

class AssignmentService implements AssignmentServiceInterface
{

    public function getAssignmentDetailsById(ListByIdRequest $request)
    {
        return Assignment::with('vehicle')->where('id', $request->get('assignment_id'))->get()->toArray();
    }
}
