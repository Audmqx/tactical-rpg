<?php

declare(strict_types = 1);

namespace Src\Character\Domain\Factories;

use Src\Character\Domain\Model\ValueObjects\HealthPoints;

class HealthPointsFactory
{
    public function create(int $HP): HealthPoints
    {
        return new HealthPoints(HP: $HP);
    }
}   