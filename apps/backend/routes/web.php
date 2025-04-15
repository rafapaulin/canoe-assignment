<?php

use App\Http\Controllers\DuplicatedFundsController;
use App\Http\Controllers\FundsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return app()->version();
});

Route::prefix('api')
    ->group(function () {
        Route::controller(FundsController::class)
            ->prefix('funds')
            ->group(function () {
                Route::get('/', 'index')->name('funds.index');
                Route::match(['put', 'patch'], '', 'update');
            });

        Route::controller(DuplicatedFundsController::class)
            ->prefix('duplicated-funds')
            ->group(function () {
                Route::get('/', 'index')->name('duplicated-funds.index');
            });
    });
