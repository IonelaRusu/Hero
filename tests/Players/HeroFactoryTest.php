<?php
declare(strict_types = 1);

namespace Players;

use App\Players\Heroes\HeroFactory;
use App\Players\Heroes\Orderus;
use App\Players\Player;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class HeroFactoryTest extends TestCase
{
    protected HeroFactory $testClass;
    protected MockObject $skillMock;

    protected function setUp(): void
    {
        parent::setUp();

        $this->testClass = new HeroFactory();
    }

    public function testGetFactoryHeroType(): void
    {
        $expectedFactory = $this->testClass->getPlayer("Orderus");

        $this->assertInstanceOf(Orderus::class, $expectedFactory);
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