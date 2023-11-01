<?php

declare (strict_types = 1);

namespace Src\Character\Domain\Model\ValueObjects;

use Src\Character\Domain\Model\Interface\WeaponInterface;

class Sword implements WeaponInterface
{
    public function Damage()
    {
        return 6;
    }
}