<?php

namespace Skills;

use App\Battle\Round;
use App\Players\Player;
use App\Players\Stats;
use App\Skills\Attack\RapidStrike;
use PHPUnit\Framework\TestCase;

class RapidStrikeTest extends TestCase
{
    protected RapidStrike $testClass;

    protected function setUp(): void
    {
        parent::setUp();

        $this->testClass = new RapidStrike();
    }

    /**
     * @dataProvider dataProvider
     *
     * @param int $param
     * @param int $result
     */
    public function testGetEffect(int $param, int $result): void
    {
        $roundMock = $this->getMockBuilder(Round::class)
            ->onlyMethods(array('getAttacker'))
            ->disableOriginalConstructor()->getMock();

        $statsMock = $this->getMockBuilder(Stats::class)
            ->onlyMethods(array('getStrength'))
            ->disableOriginalConstructor()->getMock();

        $playerMock = $this->getMockBuilder(Player::class)
            ->onlyMethods(array('getStats'))
            ->disableOriginalConstructor()->getMock();

        $statsMock->expects($this->once())
            ->method('getStrength')
            ->will($this->returnValue($param));

        $playerMock->expects($this->once())
            ->method('getStats')
            ->will($this->returnValue($statsMock));

        $roundMock->expects($this->once())
            ->method('getAttacker')
            ->will($this->returnValue($playerMock));

        $this->assertEquals($result, $this->testClass->getEffect($roundMock));
    }

    public static function dataProvider(): array
    {
        return [
            [4,8],
            [5,10],
            [100,200],
            [11,22]
        ];
    }
}