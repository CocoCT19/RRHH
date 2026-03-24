<?php

use App\Http\Controllers\CollaboratorController;

Route::prefix('collaborators')->group(function () {

    Route::get('/', [CollaboratorController::class,'index']);

    Route::post('/', [CollaboratorController::class,'store']);

    Route::put('/{id}', [CollaboratorController::class,'update']);

    Route::delete('/{id}', [CollaboratorController::class,'destroy']);

});
