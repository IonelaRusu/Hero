<?php
declare(strict_types = 1);

namespace Players;

use App\Players\AbstractPlayerFactory;
use App\Players\Heroes\HeroFactory;
use App\Players\PlayerFactoryProducer;
use App\Players\Villains\VillainFactory;
use PHPUnit\Framework\TestCase;

class PlayerFactoryProducerTest extends TestCase
{
    protected PlayerFactoryProducer $testClass;

    protected function setUp(): void
    {
        parent::setUp();

        $this->testClass = new PlayerFactoryProducer();
    }

    public function testGetFactoryHeroType(): void
    {
        $expectedFactory = $this->testClass->getFactory("Hero");

        $this->assertInstanceOf(HeroFactory::class, $expectedFactory);
        $this->assertInstanceOf(AbstractPlayerFactory::class, $expectedFactory);
    }

    public function testGetFactoryVillainType(): void
    {
        $expectedFactory = $this->testClass->getFactory("Villain");

        $this->assertInstanceOf(VillainFactory::class, $expectedFactory);
        $this->assertInstanceOf(AbstractPlayerFactory::class, $expectedFactory);
    }

    public function testGetFactoryDifferentType(): void
    {
        $expectedFactory = $this->testClass->getFactory("-");

        $this->assertEquals(null, $expectedFactory);
    }

    public function testGetFactoryNullType(): void
    {
        $expectedFactory = $this->testClass->getFactory(null);

        $this->assertEquals(null, $expectedFactory);
    }
}