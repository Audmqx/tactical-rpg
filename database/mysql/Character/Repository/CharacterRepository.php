<?php

declare(strict_types = 1);

namespace Database\MySQL\Character\Repository;

use App\Domain\Character\Model\Character;
use App\Domain\Character\Repository\CharacterRepositoryInterface;
use App\Domain\Core\Exception\PersistenceException;
use Database\MySQL\Character\Model\CharacterModel;

final class CharacterRepository implements CharacterRepositoryInterface
{
    public function save(Character $character): void
    {
        $characterEloquent = new CharacterModel();

        $characterEloquent->name = $character->name();
        $characterEloquent->id = $character->identifier();
        $characterEloquent->health_points = $character->healthPoint();
        $characterEloquent->weapon = 'tata';
        $characterEloquent->alignement = $character->status();

        try {
            $characterEloquent->save();
        } catch (\Throwable $th) {
            throw new PersistenceException([
                'message' => 'character.saving.fail'
            ]);
        }
        
    }

    public function findById(string $characterId): void
    {
        $characterEloquent = CharacterModel::find($characterId);
        
        //guard

        return Character::hydrate(
            $characterEloquent->id,
            $characterEloquent->name,
            $characterEloquent->healthPoint,
            $character->alignement
        );
    }
}