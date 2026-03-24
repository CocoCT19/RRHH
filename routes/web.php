<?php

use App\Http\Controllers\CollaboratorController;
use App\Http\Controllers\ContractController;
use Illuminate\Support\Facades\Route;

Route::prefix('collaborators')->group(function () {

    Route::get('/', [CollaboratorController::class,'index']);
    Route::post('/', [CollaboratorController::class,'store']);
    Route::put('/{id}', [CollaboratorController::class,'update']);
    Route::delete('/{id}', [CollaboratorController::class,'destroy']);

});

Route::post('/contracts', [ContractController::class, 'store']);
Route::put('/contracts/{id}', [ContractController::class, 'update']);
