<?php

namespace App\Providers;

use App\Http\Library\Repositories\AssignmentRepository;
use App\Http\Library\Repositories\CompanyRepository;
use App\Http\Library\Repositories\Interfaces\AssignmentRepositoryInterface;
use App\Http\Library\Repositories\Interfaces\CompanyRepositoryInterface;
use App\Http\Library\Repositories\Interfaces\UserRepositoryInterface;
use App\Http\Library\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RegisterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class,UserRepository::class);
        $this->app->bind(CompanyRepositoryInterface::class, CompanyRepository::class);
        $this->app->bind(AssignmentRepositoryInterface::class, AssignmentRepository::class);
    }
}
