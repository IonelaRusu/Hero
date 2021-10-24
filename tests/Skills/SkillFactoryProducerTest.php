<?php

namespace Skills;

use App\Skills\AbstractSkillFactory;
use App\Skills\Attack\AttackSkillFactory;
use App\Skills\Defence\DefenceSkillFactory;
use App\Skills\SkillFactoryProducer;
use PHPUnit\Framework\TestCase;

class SkillFactoryProducerTest extends TestCase
{
    protected SkillFactoryProducer $testClass;

    protected function setUp(): void
    {
        parent::setUp();

        $this->testClass = new SkillFactoryProducer();
    }

    public function testGetFactoryAttackType(): void
    {
        $expectedFactory = $this->testClass->getFactory("attack");

        $this->assertInstanceOf(AttackSkillFactory::class, $expectedFactory);
        $this->assertInstanceOf(AbstractSkillFactory::class, $expectedFactory);
    }

    public function testGetFactoryDefenceType(): void
    {
        $expectedFactory = $this->testClass->getFactory("defence");

        $this->assertInstanceOf(DefenceSkillFactory::class, $expectedFactory);
        $this->assertInstanceOf(AbstractSkillFactory::class, $expectedFactory);
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