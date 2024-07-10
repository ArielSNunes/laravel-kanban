<?php

namespace Kanban\Service;

use Kanban\Domain\Entity\Board;
use Kanban\Domain\Output\ColumnOutput;
use Kanban\Domain\Output\GetBoardOutput;
use Kanban\Domain\Repository\BoardRepository;
use Kanban\Domain\Repository\CardRepository;
use Kanban\Domain\Repository\ColumnRepository;

class BoardService
{
    public function __construct(
        readonly BoardRepository $boardRepository,
        readonly ColumnRepository $columnRepository,
        readonly CardRepository $cardRepository
    ) {
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
        $getBoardOutput = new GetBoardOutput();
        $getBoardOutput->name = $board->name;
        $getBoardOutput->estimative = 0;
        $getBoardOutput->columns = [];

        $columns = $this->columnRepository->findAllByBoardId($boardId);
        foreach ($columns as $column) {
            $columnOutput = new ColumnOutput();
            $columnOutput->name = $column->name;
            $columnOutput->hasEstimative = $column->hasEstimative;
            $columnOutput->estimative = 0;
            $columnOutput->cards = [];
            array_push($getBoardOutput->columns, $columnOutput);
        }
        return $getBoardOutput;
    }

    public function saveBoard(): void
    {
    }

    public function updateBoard(): void
    {
    }
}
