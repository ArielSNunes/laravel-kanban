<?php

namespace Kanban\Infra\Repository;

use Exception;
use Kanban\Domain\Entity\Board;
use Kanban\Domain\Repository\BoardRepository;
use Kanban\Infra\Model\Board as ModelBoard;

class BoardRepositoryEloquent implements BoardRepository
{
    public function findAll(): array
    {
        $boardsData = ModelBoard::all(['name', 'id']);
        $boards = $boardsData->map(function ($boardData) {
            $board = new Board($boardData->id, $boardData->name);
            return $board;
        });
        return $boards->toArray();
    }

    public function findById(int $boardId): Board
    {
        $boardData = ModelBoard::find($boardId);
        if (!$boardData) {
            throw new Exception('Board not found');
        }

        return new Board($boardData->id, $boardData->name);
    }
}
