<?php
declare(strict_types=1);

namespace Players;

use App\Battle\Round;
use App\Players\Player;
use App\Players\Stats;
use App\Skills\AbstractSkillFactory;
use App\Skills\Skill;
use App\Skills\SkillFactoryProducer;
use Exception;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class PlayerTest extends TestCase
{
    protected            $playerClass;
    protected MockObject $statsMock;
    protected MockObject $skillMock;
    protected MockObject $roundMock;
    protected MockObject $skillFactoryProducerMock;

    protected function setUp(): void
    {
        parent::setUp();

        $this->statsMock = $this->getMockBuilder(Stats::class)
            ->onlyMethods(array('getStrength', 'getHealth', 'setHealth'))
            ->disableOriginalConstructor()->getMock();

        $this->skillMock = $this->getMockBuilder(Skill::class)
            ->onlyMethods(array('getEffect'))
            ->disableOriginalConstructor()->getMock();

        $this->roundMock = $this->getMockBuilder(Round::class)
            ->onlyMethods(array('getDamage'))
            ->disableOriginalConstructor()->getMock();

        $this->skillFactoryProducerMock = $this->getMockBuilder(SkillFactoryProducer::class)
            ->onlyMethods(array('getFactory'))
            ->disableOriginalConstructor()->getMock();

        $this->playerClass = new class($this->statsMock, $this->skillFactoryProducerMock) extends Player {
            public function __construct(Stats $stats, SkillFactoryProducer $skillFactoryProducerMock)
            {
                parent::__construct();
                $this->stats = $stats;
                $this->skillFactoryProducer = $skillFactoryProducerMock;
            }
        };
    }

    public function testAttackWithNullParams(): void
    {
        $this->statsMock->expects($this->once())
            ->method('getStrength')
            ->will($this->returnValue(10));

        $this->assertEquals(10, $this->playerClass->attack());
    }

    public function testAttackWithAllParams(): void
    {
        $this->statsMock->expects($this->never())
            ->method('getStrength')
            ->will($this->returnValue(10));

        $this->skillMock->expects($this->once())
            ->method('getEffect')
            ->will($this->returnValue(2));

        $this->assertEquals(2, $this->playerClass->attack($this->roundMock, $this->skillMock));
    }

    public function testDefendWithAllParams(): void
    {
        $this->roundMock->expects($this->once())
            ->method('getDamage')
            ->will($this->returnValue(20));

        $this->statsMock->expects($this->once())
            ->method('getHealth')
            ->will($this->returnValue(85));

        $this->statsMock->expects($this->once())->method('setHealth');

        $this->skillMock->expects($this->once())
            ->method('getEffect')
            ->will($this->returnValue(30));

        $this->assertEquals(30, $this->playerClass->defend($this->roundMock, $this->skillMock));
    }


    public function testDefendWithNullSkillParams(): void
    {
        $this->roundMock->expects($this->once())
            ->method('getDamage')
            ->will($this->returnValue(20));

        $this->statsMock->expects($this->once())
            ->method('getHealth')
            ->will($this->returnValue(85));

        $this->statsMock->expects($this->once())->method('setHealth');

        $this->skillMock->expects($this->never())
            ->method('getEffect')
            ->will($this->returnValue(30));

        $this->assertEquals(20, $this->playerClass->defend($this->roundMock, null));
    }

    /**
     * @dataProvider skillsProvider
     *
     * @param array $playerDefinedSkills
     *
     * @throws Exception
     */
    public function testGenerateSkills(array $playerDefinedSkills)
    {
        $typeSkillFactoryMock = $this->getMockBuilder(AbstractSkillFactory::class)
            ->onlyMethods(array('getSkill'))
            ->disableOriginalConstructor()->getMock();

        $typeSkillFactoryMock->expects($this->any())
            ->method('getSkill')
            ->withAnyParameters()
            ->willReturnOnConsecutiveCalls($this->skillMock, $this->skillMock);

        $this->skillFactoryProducerMock
            ->expects($this->exactly(2))
                ->method('getFactory')
                ->withAnyParameters()
                ->will($this->returnValue($typeSkillFactoryMock));

        $this->assertEquals([$this->skillMock, $this->skillMock], $this->playerClass->generateSkills($playerDefinedSkills));
    }

    public function testGenerateEmptySkills()
    {
        $typeSkillFactoryMock = $this->getMockBuilder(AbstractSkillFactory::class)
            ->onlyMethods(array('getSkill'))
            ->disableOriginalConstructor()->getMock();

        $typeSkillFactoryMock->expects($this->never())
            ->method('getSkill');

        $this->skillFactoryProducerMock
            ->expects($this->never())
            ->method('getFactory');

        $this->assertEquals([], $this->playerClass->generateSkills([]));
    }

    /**
     * @dataProvider skillsProvider
     */
    public function testGenerateSkillsWithExceptionAtTypeSkillFactory(array $playerDefinedSkills)
    {
        $typeSkillFactoryMock = $this->getMockBuilder(AbstractSkillFactory::class)
            ->onlyMethods(array('getSkill'))
            ->disableOriginalConstructor()->getMock();

        $typeSkillFactoryMock->expects($this->never())
            ->method('getSkill')
            ->withAnyParameters()
            ->willReturnOnConsecutiveCalls(null, null);

        $this->skillFactoryProducerMock
            ->expects($this->once())
            ->method('getFactory')
            ->withAnyParameters()
            ->will($this->returnValue(null));

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Skill could not be created!");

        $this->playerClass->generateSkills($playerDefinedSkills);
    }

    /**
     * @dataProvider skillsProvider
     */
    public function testGenerateSkillsWithExceptionAtSkillFactory(array $playerDefinedSkills)
    {
        $typeSkillFactoryMock = $this->getMockBuilder(AbstractSkillFactory::class)
            ->onlyMethods(array('getSkill'))
            ->disableOriginalConstructor()->getMock();

        $typeSkillFactoryMock->expects($this->once())
            ->method('getSkill')
            ->withAnyParameters()
            ->willReturnOnConsecutiveCalls(null, null);

        $this->skillFactoryProducerMock
            ->expects($this->once())
            ->method('getFactory')
            ->withAnyParameters()
            ->will($this->returnValue($typeSkillFactoryMock));

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Skill could not be created!");

        $this->playerClass->generateSkills($playerDefinedSkills);
    }

    public static function skillsProvider(): array
    {
        return [
            [
                'skills' => [
                    "attack"  => ["RapidStrike"],
                    "defence" => ["MagicShield"],
                ],
            ],
        ];
    }
}