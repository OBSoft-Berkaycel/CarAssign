<?php

namespace App\Providers;

use App\Library\Repositories\AssignmentRepository;
use App\Library\Repositories\CompanyRepository;
use App\Library\Repositories\Interfaces\AssignmentRepositoryInterface;
use App\Library\Repositories\Interfaces\CompanyRepositoryInterface;
use App\Library\Repositories\Interfaces\UserRepositoryInterface;
use App\Library\Repositories\Interfaces\VehicleRepositoryInterface;
use App\Library\Repositories\UserRepository;
use App\Library\Repositories\VehicleRepository;
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
        $this->app->bind(VehicleRepositoryInterface::class,VehicleRepository::class);
    }
}
