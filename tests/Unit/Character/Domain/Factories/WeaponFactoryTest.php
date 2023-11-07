<?php

declare(strict_types = 1);

namespace Src\Character\Domain\Factories;

use PHPUnit\Framework\TestCase;
use Src\Character\Domain\Model\ValueObjects\Sword;
use Src\Character\Domain\Factories\WeaponFactory;


class WeaponFactoryTest extends TestCase
{
    public function test_create_sword()
    {
        $weaponFactory = new WeaponFactory();
        $sword = $weaponFactory->create('sword');

        $this->assertInstanceOf(Sword::class, $sword);
    }
}   