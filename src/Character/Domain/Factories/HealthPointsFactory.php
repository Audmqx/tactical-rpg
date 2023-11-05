<?php

declare(strict_types = 1);

namespace Src\Character\Domain\Factories;

use Src\Character\Domain\Model\ValueObjects\HealthPoints;

class HealthPointsFactory
{
    public function create(int $hp): HealthPoints
    {
        return new HealthPoints(HP: $hp);
    }
}   