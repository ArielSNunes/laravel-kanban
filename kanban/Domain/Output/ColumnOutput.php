<?php

namespace Kanban\Domain\Output;

class ColumnOutput
{
    public int $id;
    public string $name;
    public int $estimative;
    public bool $hasEstimative;

    /** @var CardOutput[] $cards */
    public array $cards;
}
