<?php

namespace Kanban\Entity;

use Exception;

class Column
{
    public function __construct(
        public readonly string $name,
        public readonly bool $hasEstimative
    ) {
        if (empty($name)) {
            throw new Exception('Name is required');
        }
    }
}
