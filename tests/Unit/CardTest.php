<?php

namespace Tests\Unit;

use Kanban\Domain\Entity\Card;
use PHPUnit\Framework\TestCase;

class CardTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_card_can_be_created(): void
    {
        $card = new Card('Atividade 01', 3);
        $this->assertEquals('Atividade 01', $card->title);
        $this->assertEquals(3, $card->estimative);
    }

    public function test_card_must_have_title(): void
    {
        $this->expectExceptionMessage('Title is required');
        new Card('', 3);
    }

    public function test_card_must_have_positive_estimative(): void
    {
        $this->expectExceptionMessage('Estimative must be positive');
        new Card('Atividade 01', -3);
    }
}
