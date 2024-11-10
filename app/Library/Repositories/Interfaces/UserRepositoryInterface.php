<?php
namespace App\Library\Repositories\Interfaces;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    public function getById(int $userId): Collection|User;
    public function create(RegisterRequest $request): void;
}