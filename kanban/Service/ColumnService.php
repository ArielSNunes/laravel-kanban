<?php

namespace Kanban\Service;

use Illuminate\Support\Facades\DB;
use Kanban\Domain\Entity\Column;
use Kanban\Domain\Input\SaveColumnInput;
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

    public function saveColumn(SaveColumnInput $input): int
    {
        return $this->columnRepository->saveColumn(new Column(
            $input->boardId,
            1,
            $input->name,
            $input->hasEstimative
        ));
    }

    public function getColumn(int $id): Column
    {
        return $this->columnRepository->getColumn($id);
    }

    public function deleteColumn(int $id): void
    {
        $this->columnRepository->deleteColumn($id);
    }
}
