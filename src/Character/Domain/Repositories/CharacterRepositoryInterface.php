<?php

namespace Src\Character\Domain\Repositories;

use Ramsey\Uuid\UuidInterface;
USE Src\Character\Domain\Model\Entities\Character;

interface CharacterRepositoryInterface
{

    public function findById(UuidInterface $characterId): Character;

    public function store(Character $character): void;

    public function update(Character $character): void;

    public function delete(int $characterId): void;
}