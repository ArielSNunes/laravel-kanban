<?php

use App\Http\Controllers\BoardController;
use Illuminate\Support\Facades\Route;

Route::prefix('/boards')->group(function () {
    Route::get('/', [BoardController::class, 'getBoards']);
    Route::get('/{boardId}', [BoardController::class, 'getBoardById']);
    Route::get('/{boardId}/columns', [BoardController::class, 'getBoardColumns']);
    Route::post('/{boardId}/columns', [BoardController::class, 'saveColumn']);
    Route::get('/{boardId}/columns/{columnId}', [BoardController::class, 'getColumn']);
    Route::delete('/{boardId}/columns/{columnId}', [BoardController::class, 'deleteColumn']);
    Route::get('/{boardId}/columns/{columnId}/cards', [BoardController::class, 'getCardsFromBoardAndColumn']);
});
