<?php

namespace Tests\Unit;

use Kanban\Domain\Entity\Board;
use PHPUnit\Framework\TestCase;

class BoardTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_board_can_be_created(): void
    {
        $board = new Board(1, 'Projeto 01');
        $this->assertEquals('Projeto 01', $board->name);
    }

    public function test_board_must_have_a_name(): void
    {
        $this->expectExceptionMessage('Name is required');
        new Board(1, "");
    }
}
