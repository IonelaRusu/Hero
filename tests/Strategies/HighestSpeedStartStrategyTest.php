<?php

namespace Strategies;

use App\Players\Player;
use App\Players\Stats;
use App\Strategies\HighestSpeedStartStrategy;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class HighestSpeedStartStrategyTest extends TestCase
{
    protected HighestSpeedStartStrategy $testClass;

    protected MockObject $heroStatsMock;
    protected MockObject $villainStatsMock;
    protected MockObject $villainMock;
    protected MockObject $heroMock;

    protected function setUp(): void
    {
        parent::setUp();

        $this->testClass = new HighestSpeedStartStrategy();

        $this->heroStatsMock = $this->getMockBuilder(Stats::class)
            ->onlyMethods(array('getSpeed'))
            ->disableOriginalConstructor()->getMock();

        $this->villainStatsMock = $this->getMockBuilder(Stats::class)
            ->onlyMethods(array('getSpeed'))
            ->disableOriginalConstructor()->getMock();

        $this->heroMock = $this->getMockBuilder(Player::class)
            ->onlyMethods(array('getStats'))
            ->disableOriginalConstructor()->getMock();

        $this->villainMock = $this->getMockBuilder(Player::class)
            ->onlyMethods(array('getStats'))
            ->disableOriginalConstructor()->getMock();

    }

    public function testGetPlayersOrderEqualSpeed(): void
    {
        $this->heroMock->expects($this->any())
            ->method('getStats')
            ->will($this->returnValue($this->heroStatsMock));

        $this->villainMock->expects($this->any())
            ->method('getStats')
            ->will($this->returnValue($this->villainStatsMock));

        $this->heroStatsMock->expects($this->any())
            ->method('getSpeed')
            ->will($this->returnValue(10));

        $this->villainStatsMock->expects($this->any())
            ->method('getSpeed')
            ->will($this->returnValue(10));

        $this->assertEquals([], $this->testClass->getPlayersOrder($this->heroMock, $this->villainMock));
    }

    public function testGetPlayersOrderNotEqualSpeed(): void
    {
        $this->heroMock->expects($this->any())
            ->method('getStats')
            ->will($this->returnValue($this->heroStatsMock));

        $this->villainMock->expects($this->any())
            ->method('getStats')
            ->will($this->returnValue($this->villainStatsMock));

        $this->heroStatsMock->expects($this->any())
            ->method('getSpeed')
            ->will($this->returnValue(20));

        $this->villainStatsMock->expects($this->any())
            ->method('getSpeed')
            ->will($this->returnValue(10));

        $this->assertEquals(
            ["order" => ["first" => $this->heroMock, "second" => $this->villainMock]],
            $this->testClass->getPlayersOrder($this->heroMock, $this->villainMock));
    }

    public function testGetPlayersOrderNotEqualSpeedReversed(): void
    {
        $this->heroMock->expects($this->any())
            ->method('getStats')
            ->will($this->returnValue($this->heroStatsMock));

        $this->villainMock->expects($this->any())
            ->method('getStats')
            ->will($this->returnValue($this->villainStatsMock));

        $this->heroStatsMock->expects($this->any())
            ->method('getSpeed')
            ->will($this->returnValue(10));

        $this->villainStatsMock->expects($this->any())
            ->method('getSpeed')
            ->will($this->returnValue(20));

        $this->assertEquals(
            ["order" => ["first" => $this->villainMock, "second" => $this->heroMock,]],
            $this->testClass->getPlayersOrder($this->heroMock, $this->villainMock));
    }
}