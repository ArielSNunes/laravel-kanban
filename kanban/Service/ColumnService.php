<?php

namespace Kanban\Service;

use Illuminate\Support\Facades\DB;
use Kanban\Domain\Entity\Column;
use Kanban\Domain\Repository\ColumnRepository;

class ColumnService
{
    public function __construct(readonly ColumnRepository $columnRepository)
    {
    }

    /**
     * @return Column[]
     */
    public function getColumns(int $boardId): array
    {
        return $this->columnRepository->findAllByBoardId($boardId);
    }
}
