<?php

namespace Kanban\Service;

use Illuminate\Support\Facades\DB;
use Kanban\Domain\Entity\Card;
use Kanban\Domain\Repository\CardRepository;

class CardService
{
    public function __construct(readonly CardRepository $cardRepository)
    {
    }

    /**
     * @return Card[]
     */
    public function getCards(int $columnId): array
    {
        return $this->cardRepository->findAllByColumnId($columnId);
    }
}
