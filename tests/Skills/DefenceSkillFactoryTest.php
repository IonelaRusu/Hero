<?php

namespace Skills;

use App\Skills\Defence\DefenceSkillFactory;
use App\Skills\Defence\MagicShield;
use App\Skills\Skill;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

require_once realpath("src/config.php");

class DefenceSkillFactoryTest extends TestCase
{
    protected DefenceSkillFactory $testClass;
    protected MockObject $skillMock;

    protected function setUp(): void
    {
        parent::setUp();

        $this->testClass = new DefenceSkillFactory();

    }

    public function testGetFactoryMagicShieldType(): void
    {
        $expectedFactory = $this->testClass->getSkill("MagicShield");

        $this->assertInstanceOf(MagicShield::class, $expectedFactory);
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