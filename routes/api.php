<?php

use App\Http\Controllers\Api\ApplicationController;
use App\Http\Controllers\Api\Auth\CompanyController as AuthCompany;
use App\Http\Controllers\Api\PositionController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthCompany::class)
  ->prefix('auth')
  ->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
  });

Route::controller(PositionController::class)
  ->prefix('positions')
  ->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
      Route::post('/', 'store');
        Route::get('/', 'index');
        Route::get('/{code}', 'show');
    });

    Route::controller(ApplicationController::class)
      ->group(function () {
        Route::post('/{code}/applications', 'store');
        Route::middleware('auth:sanctum')->group(function () {
          Route::get('/{code}/applications', 'show');
        });
      });
  });


