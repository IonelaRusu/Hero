<?php
declare(strict_types = 1);

namespace Battle;

use App\Battle\Battle;
use App\Players\Player;
use App\Strategies\StartStrategy;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class BattleTest extends TestCase
{
    protected Battle $testClass;
    protected MockObject $strategyMock;
    protected MockObject $player1Mock;
    protected MockObject $player2Mock;

    protected function setUp(): void
    {
        parent::setUp();

        $this->strategyMock = $this->getMockBuilder(StartStrategy::class)
            ->onlyMethods(array('getPlayersOrder'))
            ->disableOriginalConstructor()->getMock();

        $this->testClass = new Battle($this->strategyMock);

        $this->player1Mock = $this->getMockBuilder(Player::class)
            ->onlyMethods(array('getSkills'))
            ->disableOriginalConstructor()->getMock();

        $this->player2Mock = $this->getMockBuilder(Player::class)
            ->onlyMethods(array('getSkills'))
            ->disableOriginalConstructor()->getMock();
    }

    public function testGetPlayersOrderByStrategy() {
        $result = ["order" => ["first" => $this->player1Mock, "second" => $this->player2Mock]];

        $this->strategyMock->expects($this->once())
            ->method('getPlayersOrder')
            ->will($this->returnValue($result));

        $this->assertEquals($result, $this->testClass->getPlayersOrderByStrategy($this->player1Mock, $this->player2Mock));
    }
}