<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyVehicles\ListByIdRequest;
use App\Library\Repositories\Interfaces\CompanyVehiclesRepositoryInterface;
use Illuminate\Support\Facades\Log;

class CompanyVehicleController extends Controller
{

    public function __construct(private readonly CompanyVehiclesRepositoryInterface $companyVehiclesRepository){}

    /**
     * Display a listing of all company vehicles.
     */
    public function listAll()
    {
        try {
            $vehicles = $this->companyVehiclesRepository->getAll();
            Log::info("All company vehicles were listed successfully!");
            return response()->json([
                "status" => true,
                "data" => $vehicles
            ]);
        } catch (\Throwable $th) {
            Log::error('There is an error occured at listing all company vehicles process! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => "There is an error occured at listing all company vehicles process!"
            ],422);
        }
    }

    /**
     * Display the specified company vehicle by ID.
     */
    public function getVehicleById(ListByIdRequest $request)
    {
        try {
            $vehicle = $this->companyVehiclesRepository->getById($request);
            Log::info("Company vehicle was listed successfully!");
            return response()->json([
                "status" => true,
                "data" => $vehicle
            ]);
        } catch (\Throwable $th) {
            Log::error('There is an error occured at listing company vehicle process! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => "There is an error occured at listing company vehicle process!"
            ],422);
        }
    }
}
