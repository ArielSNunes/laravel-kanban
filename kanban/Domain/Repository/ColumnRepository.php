<?php

namespace Kanban\Domain\Repository;

use Kanban\Domain\Entity\Column;

interface ColumnRepository
{
    /**
     * @return Column[]
     */
    public function findAllByBoardId(int $boardId): array;

    /**
     * Retorna o id do registro
     */
    public function saveColumn(Column $column): int;

    public function getColumn(int $id): Column;

    public function deleteColumn(int $id): void;
}
