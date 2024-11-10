<?php

namespace App\Http\Controllers;

use App\Http\Library\Repositories\Interfaces\AssignmentRepositoryInterface;
use App\Http\Requests\Assignment\CreateRequest;
use App\Http\Requests\Assignment\DeleteRequest;
use App\Http\Requests\Assignment\ListByIdRequest;
use App\Http\Requests\Assignment\UpdateRequest;
use Illuminate\Support\Facades\Log;

class AssignmentController extends Controller
{

    public function __construct(private readonly AssignmentRepositoryInterface $assignmentRepository){}

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
     * Get assignment by ID.
     *
     * @param ListByIdRequest
     * @return \Illuminate\Http\Response
     */
    public function getAssignmentById(ListByIdRequest $request)
    {
        try {
            $assignment = $this->assignmentRepository->getById($request);
            Log::info("Assignment datas were listed successfully!");
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
