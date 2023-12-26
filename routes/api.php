<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([

    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');


});
//Route::apiResource('/employee','Api\EmployeeController');

//employee
Route::apiResource('/employee','App\Http\Controllers\Api\EmployeeController');
//branch
Route::apiResource('/branch','App\Http\Controllers\Api\BranchController');
//department
Route::apiResource('/department','App\Http\Controllers\Api\DepartmentController');
//designation
Route::apiResource('/designation','App\Http\Controllers\Api\DesignationController');
//shift
Route::apiResource('/shift','App\Http\Controllers\Api\ShiftController');

//Supplier
Route::apiResource('/supplier','App\Http\Controllers\Api\SupplierController');
//Category
Route::apiResource('/category','App\Http\Controllers\Api\CategoryController');
//Brand
Route::apiResource('/brand','App\Http\Controllers\Api\BrandController');
//Tax
Route::apiResource('/tax','App\Http\Controllers\Api\TaxController');
//Vat
Route::apiResource('/vat','App\Http\Controllers\Api\VatController');
//Unit
Route::apiResource('/unit','App\Http\Controllers\Api\UnitController');
//Warehouse
Route::apiResource('/warehouse','App\Http\Controllers\Api\WarehouseController');
//Product
Route::apiResource('/product','App\Http\Controllers\Api\ProductController');

