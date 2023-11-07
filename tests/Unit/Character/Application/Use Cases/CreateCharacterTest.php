<?php

declare (strict_types = 1);

namespace Tests\Unit\Character\Application\UseCases;



use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

use Src\Character\Domain\Factories\HealthPointsFactory;
use Src\Character\Domain\Factories\WeaponFactory;
use Src\Character\Domain\Factories\CharacterFactory;
use Src\Character\Application\UseCases\CreateEnnemy;
use Src\Character\Domain\Model\Entities\Character;

class CreateCharacterTest extends TestCase
{

    private $HP;
    private $sword;
    private $character;

    public function setUp(): void
    {
        $this->HP = new HealthPointsFactory;
        $this->HP = $this->HP->create(HP: 60);

        $this->sword = new WeaponFactory;
        $this->sword = $this->sword->create('sword');

        $this->character = new CharacterFactory;
        $this->character = $this->character->create(id: Uuid::uuid4(), name: "Agrias", HP: $this->HP, weapon: $this->sword);
    }


    public function testCreateEnemy()
    {
        $character = new Character(
            id: Uuid::uuid4(),
            name: "Test Ennemy",
            HP: new \Src\Character\Domain\Model\ValueObjects\HealthPoints(HP: 100),
            weapon: new \Src\Character\Domain\Model\ValueObjects\Sword()
        );
        
        $createEnnemyUseCase = $this->createMock(CreateEnnemy::class);

        $createEnnemyUseCase
            ->expects($this->once())
            ->method('execute')
            ->willReturn($character); 
    
        $result = $createEnnemyUseCase->execute();
        
        $this->assertInstanceOf(Character::class, $result);
    }
}