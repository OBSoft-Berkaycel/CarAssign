<?php
namespace App\Http\Library\Repositories\Interfaces;

use App\Http\Requests\Company\CreateRequest;
use App\Http\Requests\Company\DeleteRequest;
use Illuminate\Database\Eloquent\Collection;

interface CompanyRepositoryInterface
{
    public function getAll(): Collection;
    public function getById(int $companyId): Collection;
    public function create(CreateRequest $request): void;
    public function delete(DeleteRequest $request): void;
}