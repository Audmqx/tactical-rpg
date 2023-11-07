<?php

declare(strict_types = 1);

use Ramsey\Uuid\UuidInterface;
use Src\Character\Domain\Model\Entities\Character;
use Src\Character\Domain\Repositories\CharacterRepositoryInterface;

class CharacterRepository implements CharacterRepositoryInterface
{
    public function findById(UuidInterface $characterId): Character
    {
        
    }

    public function store(Character $character): Character
    {
        
    }

    public function update(Character $character): void
    {
        
    }

    public function delete(int $characterId): void
    {
        
    }
}