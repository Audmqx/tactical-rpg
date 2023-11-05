<?php

namespace Tests\Unit\Character\Domain;

use PHPUnit\Framework\TestCase;
use Src\Character\Domain\Model\Entities\Character;
use Src\Character\Domain\Model\ValueObjects\Sword;
use Src\Character\Domain\Model\ValueObjects\HealthPoints;
use Ramsey\Uuid\Uuid;

class CharacterTest extends TestCase
{
    private $HP;
    private $sword;
    private $character;

    public function setUp(): void
    {
        $this->HP = new HealthPoints(HP: 60);
        $this->sword = new Sword;

        $this->character = new Character(id: Uuid::uuid4(), name: "Agrias", HP: $this->HP, weapon: $this->sword);
    }

    public function test_character_has_a_name() 
    {
        $this->assertSame("Agrias", $this->character->getName());
    }

    public function test_character_is_an_ally() 
    {
        $this->character->setAlignementToAlly();
        $this->assertTrue($this->character->isAlly());
    }

    public function test_character_deal_damage() 
    {
        $this->assertSame(6, $this->character->dealDamage());
    }

    public function test_character_has_health_points() 
    {
        $this->assertSame(60, $this->character->getHP());
    }

    public function test_character_should_receive_damage()
    {
        $initialHP = $this->character->getHP();

    
        $damageAmount = 10;
        $this->character->receiveDamage($damageAmount);

        $expectedHP = $initialHP - $damageAmount;

        $this->assertSame($expectedHP, $this->character->getHP());
    }
}
