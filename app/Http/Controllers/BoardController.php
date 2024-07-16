<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kanban\Service\BoardService;
use Kanban\Service\CardService;
use Kanban\Service\ColumnService;

class BoardController extends Controller
{
    public function __construct(
        readonly BoardService $boardService,
        readonly ColumnService $columnService,
        readonly CardService $cardService
    ) {
    }

    public function getBoards()
    {
        $boards = $this->boardService->getBoards();
        return response()->json($boards);
    }

    public function getBoardById(int $boardId)
    {
        $boards = $this->boardService->getBoard($boardId);
        return response()->json($boards);
    }

    public function getBoardColumns(int $boardId)
    {
        $columns = $this->columnService->getColumns($boardId);
        return response()->json($columns);
    }

    public function getCardsFromBoardAndColumn(int $boardId, int $columnId)
    {
        $columns = $this->cardService->getCards($columnId);
        return response()->json($columns);
    }
}
