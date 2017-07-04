<?php

/*
 * This file is part of the Dice Package.
 *
 * (c) Ioannis Papikas <papikas.ioan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dice\Tests\Rollers;

use Dice\Random\MTRand;
use Dice\Rollers\Dice;
use PHPUnit_Framework_TestCase;

/**
 * Class DiceTest
 * @package Dice\TestsRollers
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

        $this->dice = new Dice(new MTRand());
    }

    /**
     * @covers \Dice\Rollers\Dice::validate
     * @throws \PHPUnit_Framework_AssertionFailedError
     */
    public function testValidate()
    {
        // Set less probabilities
        $probabilities = [
            1 => 1,
        ];
        $this->dice->setProbabilities($probabilities);
        $this->assertFalse($this->dice->validate());

        $probabilities = [
            1 => 0.5,
            2 => 0.5,
        ];
        $this->dice->setProbabilities($probabilities);
        $this->assertFalse($this->dice->validate());

        $probabilities = [
            1 => 1 / 6,
            2 => 1 / 6,
            3 => 1 / 6,
            4 => 1 / 6,
            5 => 1 / 6,
            6 => 1 / 6,
        ];
        $this->dice->setProbabilities($probabilities);
        $this->assertTrue($this->dice->validate());
    }
}
