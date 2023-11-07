<?php

namespace Tests\Unit\Character\Domain;

use PHPUnit\Framework\TestCase;
use Src\Character\Domain\Model\ValueObjects\HealthPoints;
use Src\Character\Domain\Model\ValueObjects\Sword;
use Src\Character\Domain\Model\Entities\Character;
use Ramsey\Uuid\Uuid;
use Src\Character\Domain\Factories\CharacterFactory;

class CharacterFactoryTest extends TestCase
{
   
    public function setUp(): void
    {
     
    }


    public function test_create_character()
    {
       $factory = new CharacterFactory;

       $HP = new HealthPoints(HP: 60);
       $sword = new Sword;

       $character = $factory->create(id: Uuid::uuid4(), name: "Gon", HP: $HP, weapon: $sword);

       $this->assertInstanceOf(Character::class, $character);
       $this->assertEquals("Gon", $character->getName());
       $this->assertEquals(60, $character->getHP());
    }
}
