<?php

namespace App\Http\Controllers;

use App\Library\Repositories\Interfaces\CompanyRepositoryInterface;
use App\Http\Requests\Company\CreateRequest;
use App\Http\Requests\Company\DeleteRequest;
use App\Http\Requests\Company\ListByIdRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CompanyController extends Controller
{

    public function __construct(private readonly CompanyRepositoryInterface $companyRepository){}

    /**
     * List all companies.
     *
     * @return \Illuminate\Http\Response
     */
    public function listAll()
    {
        try {
            $companies = $this->companyRepository->getAll();
            Log::info('Companies were listed successfully!');
            return response()->json([
                "status" => true,
                "data" => $companies
            ]);
        } catch (\Throwable $th) {
            Log::error('There is an error occured at company listing process! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => "There is an error occured at company listing process!"
            ],422);
        }
    }

    /**
     * Get a company by its ID.
     *
     * @return \Illuminate\Http\Response
     */
    public function getById(ListByIdRequest $request)
    {
        try {
            $company = $this->companyRepository->getById($request->get('company_id'));
            Log::info("Company list by id process done!");
            return response()->json([
                "status" => true,
                "data" => $company
            ]);
        } catch (\Throwable $th) {
            Log::error('There is an error occured at company listing by id process! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => "There is an error occured at company listing by id process!"
            ],422);
        }
    }

    /**
     * Store a new company.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        try {
            $this->companyRepository->create($request);
            Log::info('Company record was created successfully!');
            return response()->json([
                "status" => true,
                "message" => "Company record was created successfully!"
            ]);
        } catch (\Throwable $th) {
            Log::error('There is an error occured at company create process! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => "There is an error occured at company create process!"
            ],422);
        }
    }

    /**
     * Delete a company.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function delete(DeleteRequest $request)
    {
        try {
            $this->companyRepository->create($request);
            Log::info('Company record was created successfully!');
            return response()->json([
                "status" => true,
                "message" => "Company record was created successfully!"
            ]);
        } catch (\Throwable $th) {
            Log::error('There is an error occured at company create process! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => "There is an error occured at company create process!"
            ],422);
        }
    }
}
