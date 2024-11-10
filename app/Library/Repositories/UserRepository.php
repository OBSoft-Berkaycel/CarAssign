<?php
namespace App\Http\Library\Repositories;

use App\Http\Library\Repositories\Interfaces\UserRepositoryInterface;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface
{
    public function getById(int $userId): Collection
    {
        return User::find($userId);
    }

    public function create(RegisterRequest $request): void
    {
        DB::transaction(function() use($request){
            User::create($request->all());
        });
    }
}
