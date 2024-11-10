<?php
namespace App\Library\Repositories\Interfaces;

use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    public function getById(int $userId): Collection;
    public function create(RegisterRequest $request): void;
}