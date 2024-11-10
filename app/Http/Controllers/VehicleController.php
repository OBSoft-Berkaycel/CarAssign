<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vehicles\ListByIdRequest;
use App\Library\Repositories\Interfaces\VehicleRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VehicleController extends Controller
{

    public function __construct(private readonly VehicleRepositoryInterface $vehicleRepository){}

    /**
     * List all vehicles.
     *
     * @return \Illuminate\Http\Response
     */
    public function listAll()
    {
        try {
            $vehicles = $this->vehicleRepository->getAll();
            Log::info("All vehicles were listed successfully!");
            return response()->json([
                "status" => true,
                "data" => $vehicles
            ]);
        } catch (\Throwable $th) {
            Log::error('There is an error occured at listing all vehicles process! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => "There is an error occured at listing all vehicles process!"
            ],422);
        }
    }

    /**
     * Get vehicle by ID.
     *
     * @param ListByIdRequest $request
     * @return \Illuminate\Http\Response
     */
    public function getVehicleById(ListByIdRequest $request)
    {
        try {
            $vehicle = $this->vehicleRepository->getById($request->get('vehicle_id'));
            Log::info("Vehicle datas were listed successfully!");
            return response()->json([
                "status" => true,
                "data" => $vehicle
            ]);
        } catch (\Throwable $th) {
            Log::error('There is an error occured at listing vehicle infos process! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => "There is an error occured at listing vehicle infos process!"
            ],422);
        }
    }

}
