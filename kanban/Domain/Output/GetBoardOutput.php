<?php

namespace Kanban\Domain\Output;

class GetBoardOutput
{
    public int $id;
    public string $name;
    public int $estimative;

    /** @var ColumnOutput[] $columns */
    public array $columns;
}
