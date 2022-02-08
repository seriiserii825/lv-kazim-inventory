<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['api', 'auth_token'],
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('signup', [\App\Http\Controllers\AuthController::class, 'signup']);
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::apiResources([
        'employee' => 'Api\EmployeeController',
        'media' => 'Api\MediaController',
    ]);
});
