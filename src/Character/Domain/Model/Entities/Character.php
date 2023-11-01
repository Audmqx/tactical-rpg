<?php

declare (strict_types = 1);

namespace Src\Character\Domain\Model\Entities;

use Src\Character\Domain\Model\ValueObjects\HealthPoints;
use Src\Character\Domain\Model\Interface\WeaponInterface;
use Src\Common\Domain\Entity;

class Character extends Entity
{
    private bool $isAlly;

    public function __construct(
        private string $name,
        private HealthPoints $HP,
        private WeaponInterface $weapon,
    )
    {}

    public function getName(): string
    {
        return $this->name;
    }
    
    public function setAlignementToAlly(): void
    {
        $this->isAlly = true;
    }

    public function isAlly(): bool
    {
        return $this->isAlly;
    }

    public function dealDamage(): int
    {
        return $this->weapon->damage();
    }

    public function toArray(): array
    {
        return [];
    }
}