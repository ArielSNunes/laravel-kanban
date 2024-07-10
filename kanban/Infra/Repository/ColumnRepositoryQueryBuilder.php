<?php

namespace Kanban\Infra\Repository;

use Illuminate\Support\Facades\DB;
use Kanban\Domain\Entity\Column;
use Kanban\Domain\Repository\ColumnRepository;

class ColumnRepositoryQueryBuilder implements ColumnRepository
{
    public function findAllByBoardId(int $boardId): array
    {
        $columnsData = DB::table('columns')->where('board_id', $boardId)->get([
            'id',
            'name',
            'has_estimative'
        ]);

        $columns = $columnsData->map(function ($columnData) {
            return new Column(
                $columnData->id,
                $columnData->name,
                $columnData->has_estimative
            );
        });

        return $columns->toArray();
    }
}
