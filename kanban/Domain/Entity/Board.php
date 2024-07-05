<?php

namespace Kanban\Domain\Entity;

use Exception;

class Board
{
    public function __construct(public readonly string $name)
    {
        if (empty($name)) {
            throw new Exception('Name is required');
        }
    }
}
