<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    CategoryController,
    CompanyController
};

Route::resource('categories', CategoryController::class);
Route::resource('companies', CompanyController::class);

Route::get('/', function () {
    return response()->json([
        'message' => 'success'
    ]);
});