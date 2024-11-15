<?php
namespace App\Library\Repositories\Interfaces;

use App\Http\Requests\Company\CreateRequest;
use App\Http\Requests\Company\DeleteRequest;
use App\Models\Company;
use Illuminate\Database\Eloquent\Collection;

interface CompanyRepositoryInterface
{
    public function getAll(): Collection|Company;
    public function getById(int $companyId): Collection|Company;
    public function create(CreateRequest $request): void;
    public function delete(DeleteRequest $request): void;
}