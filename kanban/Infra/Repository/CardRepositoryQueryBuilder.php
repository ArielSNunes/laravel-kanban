<?php

namespace Kanban\Infra\Repository;

use Illuminate\Support\Facades\DB;
use Kanban\Domain\Entity\Card;
use Kanban\Domain\Repository\CardRepository;

class CardRepositoryQueryBuilder implements CardRepository
{
    public function findAllByColumnId(int $columnId): array
    {
        $cardsData = DB::table('cards')->where('column_id', $columnId)->get([
            'column_id',
            'id',
            'title',
            'estimative'
        ]);
        $cards = $cardsData->map(function ($cardData) {
            return new Card(
                $cardData->column_id,
                $cardData->id,
                $cardData->title,
                $cardData->estimative
            );
        });
        return $cards->toArray();
    }
}
