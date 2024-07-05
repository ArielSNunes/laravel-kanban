<?php

namespace Kanban\Service;

use Kanban\Domain\Entity\Board;
use Kanban\Domain\Output\GetBoardOutput;
use Kanban\Domain\Repository\BoardRepository;

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

    public function getBoard(int $boardId): GetBoardOutput
    {
        $board = $this->boardRepository->findById($boardId);
    }

    public function saveBoard(): void
    {
    }

    public function updateBoard(): void
    {
    }
}
