<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChequeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UnitController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'create']);
Route::patch('/products/{id}', [ProductController::class, 'patch']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::delete('/products/{id}', [ProductController::class, 'delete']);

Route::get('/cheque', [ChequeController::class, 'index']);
Route::post('/cheque', [ChequeController::class, 'create']);
Route::get('/cheque/{id}', [ChequeController::class, 'show']);

Route::get('/units', [UnitController::class, 'index']);
Route::post('/units', [UnitController::class, 'create']);
Route::patch('/units/{id}', [UnitController::class, 'patch']);
Route::delete('/units/{id}', [UnitController::class, 'delete']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories', [CategoryController::class, 'create']);
Route::patch('/categories/{id}', [CategoryController::class, 'patch']);
Route::delete('/categories/{id}', [CategoryController::class, 'delete']);

