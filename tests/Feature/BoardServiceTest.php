<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Kanban\Infra\Repository\BoardRepositoryQueryBuilder;
use Kanban\Infra\Repository\CardRepositoryQueryBuilder;
use Kanban\Infra\Repository\ColumnRepositoryQueryBuilder;
use Kanban\Service\BoardService;
use Tests\TestCase;

class BoardServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_get_boards_method(): void
    {
        $boardService = new BoardService(
            new BoardRepositoryQueryBuilder(),
            new ColumnRepositoryQueryBuilder(),
            new CardRepositoryQueryBuilder()
        );
        $boards = $boardService->getBoards();
        $this->assertEquals(1, count($boards));
        $this->assertEquals('Projeto 01', $boards[0]->name);
    }

    public function test_get_board(): void
    {
        $boardService = new BoardService(
            new BoardRepositoryQueryBuilder(),
            new ColumnRepositoryQueryBuilder(),
            new CardRepositoryQueryBuilder()
        );
        $board = $boardService->getBoard(1);
        $this->assertEquals('Projeto 01', $board->name);
        // $this->assertEquals(4, count($board->columns));
        list($a, $b, $c) = $board->columns;
        $this->assertEquals('Coluna A', $a->name);
        $this->assertEquals('Coluna B', $b->name);
        $this->assertEquals('Coluna C', $c->name);
        $this->assertEquals(6, $a->estimative);
        $this->assertEquals(0, $b->estimative);
        $this->assertEquals(0, $c->estimative);
        $this->assertEquals(6, $board->estimative);
        list($cardA, $cardB, $cardC) = $a->cards;
        $this->assertEquals('Atividade 01', $cardA->title);
        $this->assertEquals('Atividade 02', $cardB->title);
        $this->assertEquals('Atividade 03', $cardC->title);
        $this->assertEquals(3, $cardA->estimative);
        $this->assertEquals(2, $cardB->estimative);
        $this->assertEquals(1, $cardC->estimative);
    }
}
