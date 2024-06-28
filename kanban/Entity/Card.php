<?php

namespace Kanban\Entity;

use Exception;

class Card
{
    public function __construct(
        public readonly string $title,
        public readonly int $estimative
    ) {
        if (empty($title)) {
            throw new Exception('Title is required');
        }

        if ($estimative < 0) {
            throw new Exception('Estimative must be positive');
        }
    }
}
