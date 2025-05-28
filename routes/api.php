<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::group([ 'prefix' => 'v1' ], function (Router $router)
{
    $router->group([ 'prefix' => 'employees', 'as' => 'employees.' ], function (Router $router)
    {
        $router->get('/list', [ \App\Http\API\Employees\EmployeesController::class, 'list' ])->name('list');
    });

    $router->group([ 'prefix' => 'cars', 'as' => 'cars.' ], function (Router $router)
    {
        $router->get('/list', [ \App\Http\API\Cars\CarsController::class, 'list' ])->name('list');
    });

    $router->group([ 'prefix' => 'company-cars', 'as' => 'company_cars.' ], function (Router $router)
    {
        $router->get('/list', [ \App\Http\API\CompanyCars\CompanyCarsController::class, 'list' ])->name('list');

        $router->get('/available-list', [ \App\Http\API\CompanyCars\CompanyCarsController::class, 'availableList' ])->name('available-list');
    });

    $router->group([ 'prefix' => 'schedules', 'as' => 'schedules.' ], function (Router $router)
    {
        $router->get('/list', [ \App\Http\API\Schedules\SchedulesController::class, 'list' ])->name('list');

        $router->post('/write', [ \App\Http\API\Schedules\SchedulesController::class, 'write' ])->name('write');
    });

    $router->get('/classifiers/list', [ \App\Http\API\Classifiers\ClassifiersController::class, 'list' ])->name('list');
});
