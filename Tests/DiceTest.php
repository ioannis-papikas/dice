<?php

/*
 * This file is part of the Dice Package.
 *
 * (c) Ioannis Papikas <papikas.ioan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dice\Tests;

use Dice\Dice;
use Dice\Random\MtRand;
use PHPUnit_Framework_TestCase;

/**
 * Class DiceTest
 * @package Dice\Tests
 */
class DiceTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Dice
     */
    protected $dice;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();

        $this->dice = new Dice(new MtRand());
    }

    /**
     * @covers \Dice\AbstractRoller::validate
     * @throws \PHPUnit_Framework_AssertionFailedError
     */
    public function testValidate()
    {
        // Set less probabilities
        $probabilities = [1 => 1];
        $this->dice->setProbabilities($probabilities);
        $this->assertFalse($this->dice->validate());

        $probabilities = [1 => 0.5, 2 => 0.5];
        $this->dice->setProbabilities($probabilities);
        $this->assertFalse($this->dice->validate());

        $probabilities = [
            1 => 0.1666666666666667,
            2 => 0.1666666666666667,
            3 => 0.1666666666666667,
            4 => 0.1666666666666667,
            5 => 0.1666666666666667,
            6 => 0.1666666666666667,
        ];
        $this->dice->setProbabilities($probabilities);
        $this->assertTrue($this->dice->validate());
    }
}
