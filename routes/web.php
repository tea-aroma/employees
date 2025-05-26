<?php

use Illuminate\Support\Facades\Route;

Route::group([ 'prefix' => 'admin', 'as' => 'admin.' ], function ($group)
{
    $group->group([ 'prefix' => 'home', 'as' => 'home.' ], function ($group)
    {
        $group->get('/index', [ \App\Http\Controllers\HomeController::class, 'index' ])->name('index');
    });
});
