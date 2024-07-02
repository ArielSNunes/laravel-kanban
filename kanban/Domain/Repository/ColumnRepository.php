<?php

namespace Kanban\Domain\Repository;

use Kanban\Domain\Entity\Column;

interface ColumnRepository
{
    /**
     * @return Column[]
     */
    public function findAllByBoardId(int $boardId): array;
}
