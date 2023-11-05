<?php

declare (strict_types = 1);

namespace Src\Character\Domain\Model\Entities;

use Src\Character\Domain\Model\ValueObjects\HealthPoints;
use Src\Character\Domain\Model\Interface\WeaponInterface;
use Src\Common\Domain\Entity;
use Ramsey\Uuid\UuidInterface;

class Character extends Entity
{
    const ENNEMY = "ennemy";
    const NEUTRAL = "neutral";
    const ALLY = "ally";

    private string $status;

    public function __construct(
        private UuidInterface $id,
        private string $name,
        private HealthPoints $HP,
        private WeaponInterface $weapon,
    )
    {
        $this->status = self::NEUTRAL;
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
    
    public function setAlignementToAlly(): void
    {
        $this->status = self::ALLY;
    }

    public function setAlignementToEnnemy(): void
    {
        $this->status = self::ENNEMY;
    }

    public function getStatus(): string
    {
  
        $status = match($this->status) 
        {
            self::NEUTRAL => self::NEUTRAL,
            self::ENNEMY => self::ENNEMY, 
            self::ALLY => self::ALLY, 
            default => throw new \Exception('status error')
        };

        return $status;
    }

    public function dealDamage(): int
    {
        return $this->weapon->damage();
    }

    public function receiveDamage(int $damageAmount): void
    {
        $this->HP = $this->HP->decreaseHP($damageAmount);
    }

    public function getHP(): int
    {
        return $this->HP->getHP();
    }

    public function toArray(): array
    {
        return [];
    }
}