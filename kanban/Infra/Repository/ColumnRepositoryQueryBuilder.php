<?php

namespace Kanban\Infra\Repository;

use Exception;
use Illuminate\Support\Facades\DB;
use Kanban\Domain\Entity\Column;
use Kanban\Domain\Repository\ColumnRepository;
use Kanban\Infra\Model\Column as ModelColumn;

class ColumnRepositoryQueryBuilder implements ColumnRepository
{
    public function findAllByBoardId(int $boardId): array
    {
        $columnsData = DB::table('columns')->where('board_id', $boardId)->get([
            'id',
            'board_id',
            'name',
            'has_estimative'
        ]);

        $columns = $columnsData->map(function ($columnData) {
            return new Column(
                $columnData->board_id,
                $columnData->id,
                $columnData->name,
                $columnData->has_estimative
            );
        });

        return $columns->toArray();
    }

    public function saveColumn(Column $column): int
    {
        return DB::table('columns')->insertGetId([
            'board_id' => $column->boardId,
            'name' => $column->name,
            'has_estimative' => $column->hasEstimative
        ]);
    }

    public function getColumn(int $id): Column
    {
        $columnData = DB::table('columns')->where('id', $id)->first([
            'id',
            'board_id',
            'name',
            'has_estimative'
        ]);

        if (!$columnData) {
            throw new Exception('Column not found');
        }

        return new Column(
            $columnData->id,
            $columnData->board_id,
            $columnData->name,
            $columnData->has_estimative
        );
    }


    public function deleteColumn(int $id): void
    {
        DB::table('columns')->delete($id);
    }
}
