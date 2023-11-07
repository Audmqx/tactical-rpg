<?php

declare (strict_types = 1);

namespace Src\Character\Domain\Model\Interface;


interface WeaponInterface
{
    public function getName(): string;

    public function Damage():int;
}