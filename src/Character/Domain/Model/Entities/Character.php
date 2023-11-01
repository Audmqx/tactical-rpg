<?php

declare (strict_types = 1);

namespace Src\Character\Domain\Model\Entities;

use Src\Common\Domain\Entity;

class Character extends Entity
{
    public function __construct(
        private string $name
    )
    {}

    public function getName(): string
    {
        return $this->name;
    }

    public function toArray(): array
    {
        return [];
    }
}