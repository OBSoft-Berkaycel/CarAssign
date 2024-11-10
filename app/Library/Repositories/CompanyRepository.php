<?php
namespace App\Library\Repositories;

use App\Library\Repositories\Interfaces\CompanyRepositoryInterface;
use App\Http\Requests\Company\CreateRequest;
use App\Http\Requests\Company\DeleteRequest;
use App\Models\Company;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class CompanyRepository implements CompanyRepositoryInterface
{
    public function getAll(): Collection
    {
        return Company::all();
    }

    public function getById(int $companyId): Collection
    {
        return Company::find($companyId);
    }

    public function create(CreateRequest $request): void
    {
        DB::transaction(function() use($request){
            Company::create($request->all());
        });
    }

    public function delete(DeleteRequest $request): void
    {
        DB::transaction(function() use ($request){
            $company = Company::find($request->get('company_id'));
            $company->delete();
        });
    }
}
