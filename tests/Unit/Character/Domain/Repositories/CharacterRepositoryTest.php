<?php

namespace Tests\Unit\Character\Domain;

use PHPUnit\Framework\TestCase;
use Src\Character\Domain\Repositories\CharacterRepositoryInterface;
use Src\Character\Domain\Model\Entities\Character;
use Src\Character\Domain\Model\ValueObjects\HealthPoints;
use Src\Character\Domain\Model\ValueObjects\Sword;
use Ramsey\Uuid\Uuid;


class CharacterRepositoryTest extends TestCase
{
    private $characterRepository;
    private $basicCharacter;

    public function setUp(): void
    {
        $this->characterRepository = $this->createMock(CharacterRepositoryInterface::class);
        $this->basicCharacter = new Character(
            id: Uuid::uuid4(),
            name: "Agrias",
            HP: new HealthPoints(HP: 60),
            weapon: new Sword()
        );
    }


    public function test_save_character_to_database()
    {
        $this->characterRepository
            ->expects($this->once())
            ->method('store')
            ->with($this->equalTo($this->basicCharacter));

        $this->characterRepository->store($this->basicCharacter);
    }

    public function test_find_character_by_id()
    {
        $characterId = Uuid::uuid4();
    
        $this->characterRepository
            ->expects($this->once())
            ->method('findById')
            ->with($this->equalTo($characterId))
            ->willReturn($this->basicCharacter); 
    
        $result = $this->characterRepository->findById($characterId);

        $this->assertSame($this->basicCharacter, $result);
    }

    public function test_update_character_in_database()
    {
        $this->characterRepository
            ->expects($this->once())
            ->method('update')
            ->with($this->equalTo($this->basicCharacter));

        $this->characterRepository->update($this->basicCharacter);
    }

    public function test_delete_character_from_database()
    {
        $characterId = 123; 

        $this->characterRepository
            ->expects($this->once())
            ->method('delete')
            ->with($this->equalTo($characterId));

        $this->characterRepository->delete($characterId);
    }
}
