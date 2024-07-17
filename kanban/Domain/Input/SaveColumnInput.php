<?php

namespace Kanban\Domain\Input;

class SaveColumnInput
{
    public int $boardId;
    public string $name;
    public bool $hasEstimative;
}
