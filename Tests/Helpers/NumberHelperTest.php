<?php

/*
 * This file is part of the Dice Package.
 *
 * (c) Ioannis Papikas <papikas.ioan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dice\Tests\Helpers;

use Dice\Helpers\NumberHelper;
use PHPUnit_Framework_TestCase;

/**
 * Class NumberHelperTest
 * @package Dice\Helpers\Tests
 */
class NumberHelperTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \Dice\Helpers\NumberHelper::floor
     */
    public function testFloor()
    {
        // No decimals
        $this->assertEquals(10, NumberHelper::floor(10.235, 0));
        $this->assertEquals(10, NumberHelper::floor(10.543, 0));
        $this->assertEquals(10, NumberHelper::floor(10.987, 0));

        // With decimals
        $this->assertEquals(10.12, NumberHelper::floor(10.123456789, 2));
        $this->assertEquals(10.12345, NumberHelper::floor(10.123456789, 5));
        $this->assertEquals(10.12345678, NumberHelper::floor(10.123456789, 8));

        $this->assertEquals(10.98, NumberHelper::floor(10.987654321, 2));
        $this->assertEquals(10.98765, NumberHelper::floor(10.987654321, 5));
        $this->assertEquals(10.98765432, NumberHelper::floor(10.987654321, 8));
    }

    /**
     * @covers \Dice\Helpers\NumberHelper::average
     * @throws \PHPUnit_Framework_AssertionFailedError
     */
    public function testAverage()
    {
        // Normal input
        $this->assertEquals(2, NumberHelper::average([1, 2, 3]));
        $this->assertEquals(3, NumberHelper::average([3, 3, 3]));

        // Empty input
        $this->assertFalse(NumberHelper::average([]));
        $this->assertFalse(NumberHelper::average(null));
    }

    /**
     * @covers \Dice\Helpers\NumberHelper::equal
     * @throws \PHPUnit_Framework_AssertionFailedError
     */
    public function testIsEqual()
    {
        // Valid cases
        $this->assertTrue(NumberHelper::equal(1, 1, 0));
        $this->assertTrue(NumberHelper::equal(1, 1, 1));
        $this->assertTrue(NumberHelper::equal(1, 1, 2));
        $this->assertTrue(NumberHelper::equal(1.1234, 1.1235, 3));

        // Invalid cases
        $this->assertFalse(NumberHelper::equal(1, 2, 0));
        $this->assertFalse(NumberHelper::equal(1.123, 2.123, 0));
        $this->assertFalse(NumberHelper::equal(1.123, 2.123, 3));
        $this->assertFalse(NumberHelper::equal(1.1234, 1.123, 4));
    }

    /**
     * @covers \Dice\Helpers\NumberHelper::numberOfDecimals
     * @throws \Exception
     */
    public function testNumberOfDecimals()
    {
        $this->assertEquals(0, NumberHelper::numberOfDecimals(10));
        $this->assertEquals(0, NumberHelper::numberOfDecimals(10.0));

        $this->assertEquals(1, NumberHelper::numberOfDecimals(10.1));
        $this->assertEquals(2, NumberHelper::numberOfDecimals(10.12));
        $this->assertEquals(2, NumberHelper::numberOfDecimals(10.120));

        $this->assertEquals(3, NumberHelper::numberOfDecimals(10.121));
        $this->assertEquals(3, NumberHelper::numberOfDecimals(10.12100));
    }
}
