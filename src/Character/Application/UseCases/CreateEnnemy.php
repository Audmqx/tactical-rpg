<?php

declare( strict_types = 1);

namespace Src\Character\Application\UseCases;

use Src\Character\Domain\Factories\CharacterFactory;
use Src\Character\Domain\Factories\HealthPointsFactory;
use Src\Character\Domain\Factories\WeaponFactory;
use Ramsey\Uuid\Uuid;
use Src\Character\Domain\Model\Entities\Character;
use Src\Character\Application\Repositories\CharacterRepository;

class CreateEnnemy
{

    private $characterRepository;

    public function __construct(
        private HealthPointsFactory $healthPointsFactory,
        private WeaponFactory $weaponFactory,
        private CharacterFactory $characterFactory,
        private string $name
    )
    {
        $this->characterRepository = new CharacterRepository(characterFactory: $this->characterFactory, healthPointsFactory: $this->healthPointsFactory, weaponFactory: $this->weaponFactory);
    }

    public function execute(): Character
    {
        $id = Uuid::uuid4();
        $HP = $this->healthPointsFactory->create(HP: 60);
        $weapon = $this->weaponFactory->create('sword');
        $character = $this->characterFactory->create(id: $id, name: $this->name,HP: $HP, weapon: $weapon);

        $character->setAlignementToEnnemy();

        $this->characterRepository->store($character);

        return $character;
    }
}