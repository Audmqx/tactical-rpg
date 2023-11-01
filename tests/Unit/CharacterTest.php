<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Src\Character\Domain\Model\Entities\Character;
use Src\Character\Domain\Model\ValueObjects\Sword;
use Src\Character\Domain\Model\ValueObjects\HealthPoints;

class CharacterTest extends TestCase
{

    public function test_character_is_an_ally_have_a_sword_and_full_hp() {
        
        $HP = new HealthPoints(HP: 60);
        $sword = new Sword;

        $character = new Character(name: "Agrias", HP: $HP, weapon: $sword);

        $this->assertSame("Agrias", $character->getName());

        $character->setAlignementToAlly();
        $this->isTrue($character->isAlly());

        $this->assertSame(6, $character->dealDamage());
    }
}
