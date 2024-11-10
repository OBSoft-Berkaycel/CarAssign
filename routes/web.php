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
        $router->get('listAll', 'CompanyController@listAll');
        $router->get('listById', 'CompanyController@getById');
        $router->post('create', 'CompanyController@store');
        $router->delete('delete', 'CompanyController@delete');
    });

    /**
     * Assignment Routes
     */
    $router->group(['prefix' => 'assignments'], function() use($router){
        $router->get('listAll', 'AssignmentController@listAll');
        $router->get('getById', 'AssignmentController@getAssignmentById');
        $router->post('create', 'AssignmentController@store');
        $router->put('update', 'AssignmentController@update');
        $router->delete('delete', 'AssignmentController@delete');
    });

    /**
     * Vehicle Routes
     */
    $router->group(['prefix' => 'vehicles'], function() use ($router){
        $router->get('listAll', 'VehicleController@listAll');
        $router->get('getById', 'VehicleController@getVehicleById');
    });
});
