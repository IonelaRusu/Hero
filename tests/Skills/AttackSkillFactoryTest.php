<?php

namespace Skills;

use App\Skills\Attack\AttackSkillFactory;
use App\Skills\Attack\RapidStrike;
use App\Skills\Skill;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

require_once realpath("src/config.php");


class AttackSkillFactoryTest extends TestCase
{
    protected AttackSkillFactory $testClass;
    protected MockObject $skillMock;

    protected function setUp(): void
    {
        parent::setUp();

        $this->testClass = new AttackSkillFactory();
    }

    public function testGetFactoryRapidSkillType(): void
    {
        $expectedFactory = $this->testClass->getSkill("RapidStrike");

        $this->assertInstanceOf(RapidStrike::class, $expectedFactory);
        $this->assertInstanceOf(Skill::class, $expectedFactory);
    }

    public function testGetFactoryDifferentType(): void
    {
        $expectedFactory = $this->testClass->getSkill("-");

        $this->assertEquals(null, $expectedFactory);
    }

    public function testGetFactoryNullType(): void
    {
        $expectedFactory = $this->testClass->getSkill(null);

        $this->assertEquals(null, $expectedFactory);
    }
}