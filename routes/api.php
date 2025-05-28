<?php

use Illuminate\Support\Facades\Route;

Route::group([ 'prefix' => 'v1' ], function ($group)
{
    $group->group([ 'prefix' => 'employees', 'as' => 'employees.' ], function ($group)
    {
        $group->get('/list', [ \App\Http\API\Employees\EmployeesController::class, 'list' ])->name('list');
    });

    $group->group([ 'prefix' => 'cars', 'as' => 'cars.' ], function ($group)
    {
        $group->get('/list', [ \App\Http\API\Cars\CarsController::class, 'list' ])->name('list');
    });

    $group->group([ 'prefix' => 'company-cars', 'as' => 'company_cars.' ], function ($group)
    {
        $group->get('/list', [ \App\Http\API\CompanyCars\CompanyCarsController::class, 'list' ])->name('list');
    });

    $group->get('/classifiers/list', [ \App\Http\API\Classifiers\ClassifiersController::class, 'list' ])->name('list');
});
