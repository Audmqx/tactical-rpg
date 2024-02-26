<?php

declare(strict_types = 1);

namespace Src\Character\Application\Repositories;

use Ramsey\Uuid\UuidInterface;
use Src\Character\Domain\Model\Entities\Character;
use Src\Character\Domain\Repositories\CharacterRepositoryInterface;
use Src\Character\Infrastructure\EloquentModels\CharacterEloquentModel;
use Src\Character\Domain\Factories\HealthPointsFactory;
use Src\Character\Domain\Factories\WeaponFactory;
use Src\Character\Domain\Factories\CharacterFactory;
use Ramsey\Uuid\Uuid;

class CharacterRepository implements CharacterRepositoryInterface
{

    public function __construct(
        private CharacterFactory $characterFactory, 
        private HealthPointsFactory $healthPointsFactory, 
        private WeaponFactory $weaponFactory)
    {
    }

    public function findById(UuidInterface $characterId): Character
    {
        $characterModel = CharacterEloquentModel::find($characterId->toString());

        if ($characterModel === null) {
            throw new \Exception('Personnage non trouvé.');
        }

        return $this->characterFactory->create(
            id: $characterModel->id,
            name: $characterModel->name,
            HP: $this->healthPointsFactory->create($characterModel->health_points),
            weapon: $this->weaponFactory->create($characterModel->weapon),
        );
    }

    public function store(Character $character): void
    {
        $characterModel = new CharacterEloquentModel();

        $characterModel->id = $character->getId()->toString();
        $characterModel->name = $character->getName();
        $characterModel->health_points = $character->getHP();
        $characterModel->weapon = $character->getWeapon();
        $characterModel->alignement = $character->getAlignement();

        $characterModel->save();   
    }

    public function update(Character $character): void
    {
        $characterModel = CharacterEloquentModel::find($character->getId()->toString());

        if ($characterModel === null) {
            throw new \Exception('Personnage non trouvé.');
        }
       
        $characterModel->name = $character->getName();
        $characterModel->health_points = $character->getHP();
        $characterModel->weapon = $character->getWeapon();

        $characterModel->save();
    }

    public function delete(int $characterId): void
    {
        $characterModel = CharacterEloquentModel::find($characterId);

        $characterModel->delete();
    }
}