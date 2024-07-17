<?php

use App\Http\Controllers\BoardController;
use Illuminate\Support\Facades\Route;

Route::get('/boards', [BoardController::class, 'getBoards']);

Route::get('/boards/{boardId}', [BoardController::class, 'getBoardById']);

Route::get(
    '/boards/{boardId}/columns',
    [BoardController::class, 'getBoardColumns']
);

Route::post(
    '/boards/{boardId}/columns',
    [BoardController::class, 'saveColumn']
);

Route::get(
    '/boards/{boardId}/columns/{columnId}',
    [BoardController::class, 'getColumn']
);

Route::delete(
    '/boards/{boardId}/columns/{columnId}',
    [BoardController::class, 'deleteColumn']
);

Route::get(
    '/boards/{boardId}/columns/{columnId}/cards',
    [BoardController::class, 'getCardsFromBoardAndColumn']
);
