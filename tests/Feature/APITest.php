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
        $json = $response->decodeResponseJson();
        $this->assertEquals(1, $json->count());
        $this->assertEquals('Projeto 01', $json[0]['name']);
    }
}
