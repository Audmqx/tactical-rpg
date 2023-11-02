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

    public function decreaseHP(int $damageAmount): HealthPoints
    {
        $newHP = max(0, $this->HP - $damageAmount);
        return new HealthPoints($newHP);
    }
}