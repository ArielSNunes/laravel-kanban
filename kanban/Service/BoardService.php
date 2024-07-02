<?php

namespace Kanban\Service;

use Illuminate\Support\Facades\DB;
use Kanban\Domain\Entity\Board;
use Kanban\Domain\Repository\BoardRepository;
use Kanban\Domain\Repository\CardRepository;
use Kanban\Domain\Repository\ColumnRepository;

class BoardService
{
    public function __construct(readonly BoardRepository $boardRepository)
    {
    }

    /**
     *
     * @return Board[]
     */
    public function getBoards(): array
    {
        return $this->boardRepository->findAll();
    }
}
