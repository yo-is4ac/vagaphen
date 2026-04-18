<?php

use App\Http\Controllers\Api\Company\CompanyController as Company;
use App\Http\Controllers\Api\Company\PositionController as CompanyPosition;
use App\Http\Controllers\Api\Company\ApplicationController as CompanyApplication;
use App\Http\Controllers\Api\ApplicationController;
use App\Http\Controllers\Api\PositionController;
use Illuminate\Support\Facades\Route;

Route::controller(Company::class)
  ->prefix('company')
  ->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');

    Route::controller(CompanyPosition::class)
      ->prefix('positions')
      ->middleware('auth:sanctum')
      ->group(function () {
        Route::post('/', 'store');
        Route::get('/', 'index');

        Route::controller(CompanyApplication::class)->group(function () {
          Route::get('{code}/applications', 'index');
          Route::get('{code}/applications', 'show');
        });
    });
  });

Route::controller(PositionController::class)
  ->prefix('positions')
  ->group(function () {
    Route::get('/', 'index');
    Route::get('/{code}', 'show');

    Route::controller(ApplicationController::class)
      ->group(function () {
        Route::post('{code}/applications', 'store');
      });
  });


