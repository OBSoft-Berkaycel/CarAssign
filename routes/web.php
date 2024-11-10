<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\VehicleController;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->post('login', 'AuthController@login');
$router->post('register', 'AuthController@register');

$router->group(['prefix' => 'api/v1', 'middleware' => ['auth']], function () use ($router) {
    
    /**
     * Company Routes
     */
    $router->group(['prefix' => 'companies'], function() use($router){
        $router->get('listAll',[CompanyController::class, 'listAll']);
        $router->get('listById', [CompanyController::class, 'getById']);
        $router->post('create', [CompanyController::class, 'store']);
        // $router->put('update', [CompanyController::class, 'update']);
        $router->delete('delete',[CompanyController::class, 'delete']);
    });

    /**
     * Assignment Routes
     */
    $router->group(['prefix' => 'assigment'],function() use($router){
        $router->get('listAll', [AssignmentController::class, 'listAll']);
        $router->get('getById', [AssignmentController::class, 'getAssignmentById']);
        $router->post('create', [AssignmentController::class, 'store']);
        $router->put('update', [AssignmentController::class, 'update']);
        $router->delete('delete', [AssignmentController::class, 'delete']);
    });

    $router->group(['prefix' => 'vehicles'], function() use ($router){
        $router->get('listAll', [VehicleController::class, 'listAll']);
        $router->get('getById/{vehicle_id}', [VehicleController::class, 'getVehicleById']);
        $router->get('getVehiclesInStock', [VehicleController::class, 'getVehiclesInStock']);
        $router->get('getByColor', [VehicleController::class, 'getVehiclesByColor']);
        $router->get('getByHorsePower', [VehicleController::class, 'getVehiclesByHorsePower']);
    });
});
