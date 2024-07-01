<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Kanban\Entity\Board;
use Kanban\Entity\Card;
use Kanban\Entity\Column;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/boards', function () {
    $boardsData = DB::table('boards')->get(['name']);
    $boards = $boardsData->map(fn ($boardData) => new Board($boardData->name));
    return $boards;
});

Route::get('/boards/{boardId}/columns', function (int $boardId) {
    $columnsData = DB::table('columns')->where('board_id', $boardId)->get([
        'name',
        'has_estimative'
    ]);
    $columns = $columnsData->map(function ($columnData) {
        return new Column($columnData->name, $columnData->has_estimative);
    });
    return $columns;
});

Route::get(
    '/boards/{boardId}/columns/{columnId}/cards',
    function (int $boardId, int $columnId) {
        $cardsData = DB::table('cards')->where('column_id', $columnId)->get([
            'title',
            'estimative'
        ]);
        $cards = $cardsData->map(function ($cardData) {
            return new Card($cardData->title, $cardData->estimative);
        });
        return $cards;
    }
);
