<?php

declare( strict_types = 1);

namespace Src\Character\Application\UseCases;

use Src\Character\Domain\Factories\CharacterFactory;
use Src\Character\Domain\Factories\HealthPointsFactory;
use Src\Character\Domain\Factories\WeaponFactory;
use Ramsey\Uuid\Uuid;
use Src\Character\Domain\Model\Entities\Character;

class CreateEnnemy
{
    public function __construct(
        private HealthPointsFactory $healthPointsFactory,
        private WeaponFactory $weaponFactory,
        private CharacterFactory $characterFactory,
        private string $name
    )
    {}

    public function execute(): Character
    {
        $id = Uuid::uuid4();
        $HP = $this->healthPointsFactory->create(HP: 60);
        $weapon = $this->weaponFactory->create('sword');
        $character = $this->characterFactory->create(id: $id, name: $this->name,HP: $HP, weapon: $weapon);

        $character->setAlignementToEnnemy();

        $character; //repository Store //TODO

        return $character;
    }
}