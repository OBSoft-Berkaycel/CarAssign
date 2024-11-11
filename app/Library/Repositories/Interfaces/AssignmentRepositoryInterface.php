<?php
namespace App\Library\Repositories\Interfaces;

use App\Http\Requests\Assignment\CreateRequest;
use App\Http\Requests\Assignment\DeleteRequest;
use App\Http\Requests\Assignment\ListByIdRequest;
use App\Http\Requests\Assignment\UpdateRequest;
use App\Models\Assignment;
use Illuminate\Database\Eloquent\Collection;

interface AssignmentRepositoryInterface
{
    public function getAll(): Collection|Assignment;
    public function getById(ListByIdRequest $request): Collection|Assignment;
    public function create(CreateRequest $request): void;
    public function update(UpdateRequest $request): void;
    public function delete(DeleteRequest $request): void;
}