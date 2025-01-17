<?php

namespace Kanban\Domain\Repository;

use Kanban\Domain\Entity\Board;

interface BoardRepository
{
    /**
     * @return Board[]
     */
    public function findAll(): array;

    public function findById(int $boardId): Board;
}
