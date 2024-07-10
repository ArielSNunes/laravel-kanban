<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class APITest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_must_get_boards(): void
    {
        $response = $this->get('/boards');
        $boards = $response->decodeResponseJson();
        $this->assertEquals(1, $boards->count());
        $this->assertEquals('Projeto 01', $boards[0]['name']);
        // $this->assertEquals(6, $boards[0]['estimative']);
    }

    public function test_must_get_columns_from_board(): void
    {
        $response = $this->get('/boards/1/columns');
        $columns = $response->decodeResponseJson();
        $this->assertEquals(3, $columns->count());
        $this->assertEquals('Coluna A', $columns[0]['name']);
        $this->assertEquals(true, $columns[0]['hasEstimative']);
        $this->assertEquals('Coluna B', $columns[1]['name']);
        $this->assertEquals('Coluna C', $columns[2]['name']);
    }

    public function test_must_get_cards_from_column_from_board(): void
    {
        $response = $this->get('/boards/1/columns/1/cards');
        $columns = $response->decodeResponseJson();
        $this->assertEquals(3, $columns->count());
        $this->assertEquals('Atividade 01', $columns[0]['title']);
        $this->assertEquals('Atividade 02', $columns[1]['title']);
        $this->assertEquals('Atividade 03', $columns[2]['title']);
    }
}
