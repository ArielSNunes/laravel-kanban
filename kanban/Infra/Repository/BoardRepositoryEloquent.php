<?php

namespace Kanban\Infra\Repository;

use Kanban\Domain\Entity\Board;
use Kanban\Domain\Repository\BoardRepository;
use Kanban\Domain\Repository\EloquentRepository;
use Kanban\Infra\Model\Board as ModelBoard;

class BoardRepositoryEloquent implements BoardRepository
{
    public function findAll(): array
    {
        $boardsData = ModelBoard::all(['name', 'id']);
        $boards = $boardsData->map(function ($boardData) {
            $board = new Board($boardData->name);
            return $board;
        });
        return $boards->toArray();
    }
}
