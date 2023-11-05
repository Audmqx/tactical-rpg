<?php

namespace Tests\Unit\Character\Domain;

use PHPUnit\Framework\TestCase;
use Src\Character\Domain\Model\ValueObjects\HealthPoints;
use Src\Character\Domain\Factories\HealthPointsFactory;

class HealthPointFactoryTest extends TestCase
{
   
    public function setUp(): void
    {
    }


    public function test_create_health_point()
    {
       $factory = new HealthPointsFactory;

       $healthPointObject = $factory->create(HP: 60);

       $this->assertInstanceOf(HealthPoints::class, $healthPointObject);
       $this->assertEquals(60, $healthPointObject->getHP());
    }
}
