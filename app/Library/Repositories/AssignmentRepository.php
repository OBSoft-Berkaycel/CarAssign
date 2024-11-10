<?php
namespace App\Library\Repositories;

use App\Library\Enums\AssignmentStatusses;
use App\Library\Repositories\Interfaces\AssignmentRepositoryInterface;
use App\Http\Requests\Assignment\CreateRequest;
use App\Http\Requests\Assignment\DeleteRequest;
use App\Http\Requests\Assignment\ListByIdRequest;
use App\Http\Requests\Assignment\UpdateRequest;
use App\Models\Assignment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class AssignmentRepository implements AssignmentRepositoryInterface
{
    public function getAll(): Collection|Assignment
    {
        return Assignment::all();
    }

    public function getById(ListByIdRequest $request): Collection|Assignment
    {
        return Assignment::find($request->get('assignment_id'));
    }

    public function create(CreateRequest $request): void
    {
        DB::transaction(function() use ($request){
            Assignment::create($request->all());
        });
    }

    public function update(UpdateRequest $request): void
    {
        DB::transaction(function() use ($request){
            $assignment = Assignment::find($request->get('assignment_id'));
            $assignment->duration = $request->get('duration');
            $assignment->start_date = $request->get('start_date');
            $assignment->end_date = $request->get('end_date');
            $assignment->status = $request->get('status');
            $assignment->save();
        });
    }

    public function delete(DeleteRequest $request): void
    {
        DB::transaction(function() use ($request){
            $assignment = Assignment::find($request->get('assignment_id'));
            $assignment->status = AssignmentStatusses::PASSIVE;
            $assignment->save();
        });
    }
}
