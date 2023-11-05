<?php

declare(strict_types = 1);

namespace Src\Character\Domain\Factories;

use Src\Character\Domain\Model\Interface\WeaponInterface;
use Src\Character\Domain\Model\ValueObjects\Sword;

class WeaponFactory
{
    public function create(string $weaponName): WeaponInterface
    {
        $weapon = match($weaponName) {
            'sword' => new Sword,
            default => throw new \Exception('weapon not found'),
        };

        return $weapon;
    }
}   