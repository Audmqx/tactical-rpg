<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Src\Character\Domain\Model\Entities\Character;

class CharacterTest extends TestCase
{
    public function test_character_should_have_a_name() {
        $character = new Character(name: "Agrias");

        $this->assertSame("Agrias", $character->getName());
    }
}
