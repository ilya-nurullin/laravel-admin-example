<?php

namespace Tests\Unit;

use App\Services\CalculatorService;
use PHPUnit\Framework\TestCase;

/**
 * @group calc
 */
class CalcTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @dataProvider values
     */
    public function testAddSub3_1($a, $b, $expected)
    {
        $calc = new CalculatorService();

        $actual = $calc->add($a)->sub($b)->res();

        $this->assertEquals($expected, $actual);
    }
    /**
     * A basic unit test example.
     *
     * @testWith [3, 1, 2]
    [3, -1, 4]
    [3, 10, -7]
     */
    public function testAddSub3($a, $b, $expected)
    {
        $calc = new CalculatorService();

        $actual = $calc->add($a)->sub($b)->res();

        $this->assertEquals($expected, $actual);
    }

    public function values()
    {
        return [
            'a' => [3, 1, 2],
            'b' => [3, -1, 4],
            'c' => [3, 10, -7],
        ];
    }
}
