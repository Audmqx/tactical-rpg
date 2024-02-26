<?php

declare(strict_types = 1);

namespace App\Domain\Character\Repository;

use App\Domain\Character\Model\Character;

interface CharacterRepositoryInterface 
{
    public function save(Character $character): void;
}