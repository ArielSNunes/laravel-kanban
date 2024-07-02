<?php

namespace Kanban\Domain\Repository;

use Kanban\Domain\Entity\Card;

interface CardRepository
{
    /**
     * @return Card[]
     */
    public function findAllByColumnId(int $columnId): array;
}
