<?php
namespace App\Library\Services\Interfaces;

use App\Http\Requests\Assignment\ListByIdRequest;

interface AssignmentServiceInterface
{
    public function getAssignmentDetailsById(ListByIdRequest $request);
}