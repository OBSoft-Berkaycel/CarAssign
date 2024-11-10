<?php
namespace App\Http\Library\Repositories\Interfaces;

use App\Http\Requests\Assignment\CreateRequest;
use App\Http\Requests\Assignment\DeleteRequest;
use App\Http\Requests\Assignment\ListByIdRequest;
use App\Http\Requests\Assignment\UpdateRequest;
use Illuminate\Database\Eloquent\Collection;

interface AssignmentRepositoryInterface
{
    public function getAll(): Collection;
    public function getById(ListByIdRequest $request): Collection;
    public function create(CreateRequest $request): void;
    public function update(UpdateRequest $request): void;
    public function delete(DeleteRequest $request): void;
}