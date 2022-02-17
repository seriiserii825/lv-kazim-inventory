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
        'suppliers' => 'Api\SupplierController',
        'categories' => 'Api\CategoryController',
        'products' => 'Api\ProductController',
        'expenses' => 'Api\ExpenseController',
        'salaries' => 'Api\SalaryController',
        'customers' => 'Api\CustomerController',
        'orders' => 'Api\OrderController',
        'cart' => 'Api\CartController',
        'csv' => 'Api\CsvController',
    ]);
    Route::get('media-count', 'Api\MediaController@count');
    Route::get('employee-count', 'Api\EmployeeController@count');
    Route::get('suppliers-count', 'Api\SupplierController@count');
    Route::get('categories-count', 'Api\CategoryController@count');
    Route::get('categories-list', 'Api\CategoryController@list');
    Route::get('products-count', 'Api\ProductController@count');
    Route::get('expenses-count', 'Api\ExpenseController@count');
    Route::get('salaries-count', 'Api\SalaryController@count');
    Route::get('customers-count', 'Api\CustomerController@count');
    Route::get('product-create', 'Api\ProductController@productCreate');
    Route::get('salary-create', 'Api\SalaryController@salaryCreate');
    Route::get('salary-month', 'Api\SalaryController@salaryMonth');
    Route::get('salary-month-single/{month}', 'Api\SalaryController@salaryMonthSingle');
});
