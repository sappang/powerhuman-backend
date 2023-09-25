<?php

use App\Http\Controllers\API\CompanyController;
use App\Http\Controllers\API\UserController;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
// Company API

Route::prefix('company')->middleware('auth:sanctum')->group(function(){
    Route::get('',[CompanyController::class, 'fetch'])->name('fetch');
    Route::post('',[CompanyController::class, 'create'])->name('create');
    Route::put('company/{id}',[CompanyController::class, 'update'])->name('update');

});


// Auth API
Route::name('auth.')->group(function(){
    Route::post('login',[UserController::class,'login'])->name('login');
    Route::post('register',[UserController::class,'register'])->name('register');

    Route::middleware('auth:sanctum')->group(function(){
        Route::post('logout',[UserController::class,'logout'])->name('logout');
        Route::get('user',[UserController::class,'fetch'])->name('fetch');

    });

});


