<?php

declare(strict_types = 1);

namespace Src\Character\Domain\Model\ValueObjects;

class HealthPoints
{
    public function __construct(
        private int $HP
    )
    {}

    public function getHP()
    {
        return $this->HP;
    }
}