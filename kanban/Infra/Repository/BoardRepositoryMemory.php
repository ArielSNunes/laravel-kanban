<?php

namespace Kanban\Infra\Repository;

use Kanban\Domain\Entity\Board;
use Kanban\Domain\Repository\BoardRepository;

class BoardRepositoryMemory implements BoardRepository
{
    /**
     * @var Board[] $boards
     */
    private array $boards = [];

    public function __construct()
    {
        $this->boards = [
            new Board('Projeto 01')
        ];
    }

    public function findAll(): array
    {
        return $this->boards;
    }
}
