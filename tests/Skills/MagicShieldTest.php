<?php

namespace Skills;

use App\Battle\Round;
use App\Skills\Defence\MagicShield;
use PHPUnit\Framework\TestCase;

class MagicShieldTest extends TestCase
{
    protected MagicShield $testClass;

    protected function setUp(): void
    {
        parent::setUp();

        $this->testClass = new MagicShield();
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
            ->onlyMethods(array('getDamage'))
            ->disableOriginalConstructor()->getMock();

        $roundMock->expects($this->once())
            ->method('getDamage')
            ->will($this->returnValue($param));

        $this->assertEquals($result, $this->testClass->getEffect($roundMock));
    }

    public static function dataProvider(): array
    {
        return [
            [4,2],
            [5,2],
            [100,50],
            [99,49]
        ];
    }
}