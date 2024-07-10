<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Kanban\Infra\Repository\BoardRepositoryEloquent;
use Kanban\Infra\Repository\BoardRepositoryQueryBuilder;
use Kanban\Infra\Repository\CardRepositoryQueryBuilder;
use Kanban\Infra\Repository\ColumnRepositoryQueryBuilder;
use Kanban\Service\BoardService;
use Kanban\Service\CardService;
use Kanban\Service\ColumnService;

Route::get('/boards', function () {
    $boardService = new BoardService(
        new BoardRepositoryEloquent(),
        new ColumnRepositoryQueryBuilder(),
        new CardRepositoryQueryBuilder()
    );
    $boards = $boardService->getBoards();
    return $boards;
});

Route::get('/boards/{boardId}/columns', function (int $boardId) {
    $columnService = new ColumnService(new ColumnRepositoryQueryBuilder);
    $columns = $columnService->getColumns($boardId);
    return $columns;
});

Route::get(
    '/boards/{boardId}/columns/{columnId}/cards',
    function (int $boardId, int $columnId) {
        $cardService = new CardService(new CardRepositoryQueryBuilder);
        $cards = $cardService->getCards($columnId);
        return $cards;
    }
);
