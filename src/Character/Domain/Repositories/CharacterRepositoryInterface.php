<?php

namespace Src\Character\Domain\Repositories;


USE Src\Character\Domain\Model\Entities\Character;

interface CharacterRepositoryInterface
{

    public function findById(int $characterId): Character;

    public function store(Character $character): Character;

    public function update(Character $character): void;

    public function delete(int $characterId): void;
}