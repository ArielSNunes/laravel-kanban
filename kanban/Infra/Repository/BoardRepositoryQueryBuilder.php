<?php

namespace Kanban\Infra\Repository;

use Exception;
use Illuminate\Support\Facades\DB;
use Kanban\Domain\Entity\Board;
use Kanban\Domain\Repository\BoardRepository;

class BoardRepositoryQueryBuilder implements BoardRepository
{
    public function findAll(): array
    {
        $boardsData = DB::table('boards')->get(['name', 'id']);
        $boards = $boardsData->map(function ($boardData) {
            $board = new Board($boardData->name);
            return $board;
        });
        return $boards->toArray();
    }

    public function findById(int $boardId): Board
    {
        $boardData = DB::table('boards')->find($boardId, ['name', 'id']);
        if (!$boardData) {
            throw new Exception('Board not found');
        }

        return new Board($boardData->name);
    }
}
