<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Kanban\Domain\Input\SaveColumnInput;
use Kanban\Infra\Repository\ColumnRepositoryQueryBuilder;
use Kanban\Service\ColumnService;
use Tests\TestCase;

class ColumnServiceTest extends TestCase
{
    public function test_should_save_a_column(): void
    {
        $columnRepository = new ColumnRepositoryQueryBuilder();
        $columnService = new ColumnService($columnRepository);
        $saveColumnInput = new SaveColumnInput();
        $saveColumnInput->boardId = 1;
        $saveColumnInput->name = 'Todo';
        $saveColumnInput->hasEstimative = true;
        $columnId = $columnService->saveColumn($saveColumnInput);
        $column = $columnService->getColumn($columnId);
        $this->assertEquals('Todo', $column->name);
        $columnService->deleteColumn($columnId);
    }
}
