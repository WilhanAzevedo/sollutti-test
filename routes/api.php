<?php

use App\Http\Controllers\LojasController;
use App\Http\Controllers\ProdutosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'lojas'], function () {
    Route::get('', LojasController::class . '@index');
    Route::post('', LojasController::class . '@store');
    Route::get('{id}', LojasController::class . '@show');
    Route::put('{id}', LojasController::class . '@update');
    Route::delete('{id}', LojasController::class . '@destroy');
});

Route::group(['prefix' => 'produtos'], function () {
    Route::get('', ProdutosController::class . '@index');
    Route::post('', ProdutosController::class . '@store');
    Route::get('{id}', ProdutosController::class . '@show');
    Route::put('{id}', ProdutosController::class . '@update');
    Route::delete('{id}', ProdutosController::class . '@destroy');
});

