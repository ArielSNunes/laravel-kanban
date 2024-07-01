<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/boards', function () {
    $boards = DB::table('boards')->get();
    return $boards;
});

Route::get('/boards/{boardId}/columns', function (int $boardId) {
    $columns = DB::table('columns')->where('board_id', $boardId)->get();
    return $columns;
});

Route::get(
    '/boards/{boardId}/columns/{columnId}/cards',
    function (int $boardId, int $columnId) {
        $cards = DB::table('cards')->where('column_id', $columnId)->get();
        return $cards;
    }
);
