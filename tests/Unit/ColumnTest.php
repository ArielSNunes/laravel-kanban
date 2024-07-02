<?php

namespace Tests\Unit;

use Kanban\Domain\Entity\Column;
use PHPUnit\Framework\TestCase;

class ColumnTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_column_can_be_created(): void
    {
        $column = new Column('Coluna A', true);
        $this->assertEquals('Coluna A', $column->name);
        $this->assertTrue($column->hasEstimative);
    }

    public function test_column_must_have_title(): void
    {
        $this->expectExceptionMessage('Name is required');
        new Column('', true);
    }
}
