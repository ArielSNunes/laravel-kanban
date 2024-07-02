<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Kanban\Infra\Repository\BoardRepositoryQueryBuilder;
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
        $boardService = new BoardService(new BoardRepositoryQueryBuilder());
        $boards = $boardService->getBoards();
        $this->assertEquals(1, count($boards));
        $this->assertEquals('Projeto 01', $boards[0]->name);
        // $this->assertEquals(6, $boards[0]->estimative);
    }
}
