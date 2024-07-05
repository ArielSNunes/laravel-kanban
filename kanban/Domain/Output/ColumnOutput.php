<?php

namespace Kanban\Domain\Output;

class ColumnOutput
{
    public string $name;
    public int $estimative;
    public bool $hasEstimative;

    /** @var CardOutput[] $cards */
    public array $cards;
}
