<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use Src\Character\Domain\Model\ValueObjects\HealthPoints;


class HealthPointsTest extends TestCase
{
   
    public function setUp(): void
    {
     
    }


    public function test_HP_should_have_a_value()
    {
        $HP = new HealthPoints(60);

        $this->assertSame(60, $HP->getHP());
    }

    
    public function test_HP_should_decrease_after_an_attack()
    {
        $HP = new HealthPoints(60);

        $damage = 6;

        $decreasedHP = $HP->decreaseHP($damage);

        $this->assertSame(54, $decreasedHP->getHP());
    }
}
