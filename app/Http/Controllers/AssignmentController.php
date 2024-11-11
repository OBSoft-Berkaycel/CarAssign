<?php

namespace App\Http\Controllers;

use App\Library\Repositories\Interfaces\AssignmentRepositoryInterface;
use App\Http\Requests\Assignment\CreateRequest;
use App\Http\Requests\Assignment\DeleteRequest;
use App\Http\Requests\Assignment\ListByIdRequest;
use App\Http\Requests\Assignment\UpdateRequest;
use App\Http\Requests\Assignment\VehicleAssignmentDetailsRequest;
use App\Library\Services\Interfaces\AssignmentServiceInterface;
use Exception;
use Illuminate\Support\Facades\Log;

class AssignmentController extends Controller
{

    public function __construct(private readonly AssignmentRepositoryInterface $assignmentRepository, private readonly AssignmentServiceInterface $assignmentService){}

    /**
     * List all assignments.
     *
     * @return \Illuminate\Http\Response
     */
    public function listAll()
    {
        try {
            $assignments = $this->assignmentRepository->getAll();
            Log::info("All assignment datas were listed successfully!");
            return response()->json([
                "status" => true,
                "data" => $assignments
            ]);
        } catch (\Throwable $th) {
            Log::error('There is an error occured at listing all assignments process! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => "There is an error occured at listing all assignments process!"
            ],422);
        }
    }

    /**
     * Get assignment details by assigment ID.
     *
     * @param ListByIdRequest
     * @return \Illuminate\Http\Response
     */
    public function getAssignmentById(ListByIdRequest $request)
    {
        try {
            $assignment = $this->assignmentService->getAssignmentDetailsById($request);
            if(!$assignment)
            {
                throw new Exception("There is no assignment found!");
            }
            Log::info("Assignment details were listed successfully!");
            return response()->json([
                "status" => true,
                "data" => $assignment
            ]);
        } catch (\Throwable $th) {
            Log::error('There is an error occured at listing assignment process! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => "There is an error occured at listing assignment process!"
            ],422);
        }
    }

    /**
     * Get user assignments by user id.
     *
     * @return \Illuminate\Http\Response
     */
    public function listSelfAssignments()
    {
        try {
            $assignments = $this->assignmentService->getSelfAssignments();
            if(!$assignments)
            {
                throw new Exception("There is no assignment found for you!");
            }
            Log::info("Users assignment details were listed successfully!");
            return response()->json([
                "status" => true,
                "data" => $assignments
            ]);
        } catch (\Throwable $th) {
            Log::error('There is an error occured at listing assignment process! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => "There is an error occured at listing assignment process!"
            ],422);
        }
    }

    /**
     * Get vehicle assignment details.
     *
     * @return \Illuminate\Http\Response
     */
    public function getVehicleAssignmentDetails(VehicleAssignmentDetailsRequest $request)
    {
        try {
            $assignment = $this->assignmentService->getVehicleAssignmentDetails($request);
            if(!$assignment)
            {
                throw new Exception("There is no assignment found for the incoming vehicle id!");
            }
            Log::info("Vehicle assignment details were listed successfully!");
            return response()->json([
                "status" => true,
                "data" => $assignment
            ]);
        } catch (\Throwable $th) {
            Log::error('There is an error occured at listing assignment process! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => "There is an error occured at listing assignment process!"
            ],422);
        }
    }

    /**
     * Store a new assignment.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        try {
            $this->assignmentRepository->create($request);
            Log::info("Assignment record was created successfully!");
            return response()->json([
                "status" => true,
                "message" => "Assignment record was created successfully!"
            ]);
        } catch (\Throwable $th) {
            Log::error('There is an error occured at create assignment process! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => "There is an error occured at create assignment process!"
            ],422);
        }
    }

    /**
     * Update an existing assignment.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request)
    {
        try {
            $this->assignmentRepository->update($request);
            Log::info("Assignment record was updated successfully!");
            return response()->json([
                "status" => true,
                "message" => "Assignment record was updated successfully!"
            ]);
        } catch (\Throwable $th) {
            Log::error('There is an error occured at update assignment process! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => "There is an error occured at update assignment process!"
            ],422);
        }
    }

    /**
     * Delete an assignment.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(DeleteRequest $request)
    {
        try {
            $this->assignmentRepository->delete($request);
            Log::info("Assignment record was deleted successfully!");
            return response()->json([
                "status" => true,
                "message" => "Assignment record was deleted successfully!"
            ]);
        } catch (\Throwable $th) {
            Log::error('There is an error occured at delete assignment process! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => "There is an error occured at delete assignment process!"
            ],422);
        }
    }
}
