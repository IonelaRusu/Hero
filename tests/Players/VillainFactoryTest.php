<?php
declare(strict_types = 1);

namespace Players;

use App\Players\Player;
use App\Players\Villains\Beast;
use App\Players\Villains\VillainFactory;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class VillainFactoryTest extends TestCase
{
    protected VillainFactory $testClass;
    protected MockObject $skillMock;

    protected function setUp(): void
    {
        parent::setUp();

        $this->testClass = new VillainFactory();
    }

    public function testGetFactoryHeroType(): void
    {
        $expectedFactory = $this->testClass->getPlayer("Beast");

        $this->assertInstanceOf(Beast::class, $expectedFactory);
        $this->assertInstanceOf(Player::class, $expectedFactory);
    }

    public function testGetFactoryDifferentType(): void
    {
        $expectedFactory = $this->testClass->getPlayer("-");

        $this->assertEquals(null, $expectedFactory);
    }

    public function testGetFactoryNullType(): void
    {
        $expectedFactory = $this->testClass->getPlayer(null);

        $this->assertEquals(null, $expectedFactory);
    }
}