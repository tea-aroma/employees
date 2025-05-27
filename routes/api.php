<?php

use Illuminate\Support\Facades\Route;

Route::group([ 'prefix' => 'v1' ], function ($group)
{
    $group->group([ 'prefix' => 'employees', 'as' => 'employees.' ], function ($group)
    {
        $group->get('/list', [ \App\Http\API\Employees\EmployeesController::class, 'list' ])->name('list');
    });
});
