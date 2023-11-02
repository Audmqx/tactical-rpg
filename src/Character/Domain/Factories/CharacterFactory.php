<?php

declare(strict_types = 1);

namespace Src\Character\Domain\Factories;

use Src\Character\Domain\Model\Entities\Character;
use Src\Character\Domain\Model\Interface\WeaponInterface;
use Src\Character\Domain\Model\ValueObjects\HealthPoints;
use Ramsey\Uuid\UuidInterface;

class CharacterFactory
{
    public function create(UuidInterface $id, string $name, HealthPoints $HP, WeaponInterface $weapon): Character
    {
        return new Character(id: $id, name: $name, HP: $HP, weapon: $weapon);
    }
}