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

use Dice\Random\MtRand;
use Dice\Roller;
use PHPUnit_Framework_TestCase;

/**
 * Class RollerTest
 * @package Dice\Tests
 */
class RollerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Roller
     */
    protected $roller;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();

        $this->roller = new Roller(new MtRand());
    }

    /**
     * @covers \Dice\AbstractRoller::validate
     * @throws \PHPUnit_Framework_AssertionFailedError
     */
    public function testValidate()
    {
        // Set normal probabilities
        $probabilities = [1 => 1];
        $this->roller->setProbabilities($probabilities);
        $this->assertTrue($this->roller->validate());

        $probabilities = [1 => 0.5, 2 => 0.5];
        $this->roller->setProbabilities($probabilities);
        $this->assertTrue($this->roller->validate());

        $probabilities = [1 => 0.3, 2 => 0.2, 3 => 0.1, 4 => 0.4];
        $this->roller->setProbabilities($probabilities);
        $this->assertTrue($this->roller->validate());

        $probabilities = [1 => 0.3, 2 => 0.2, 3 => 0.1, 4 => 0.4];
        $this->roller->setProbabilities($probabilities);
        $this->assertTrue($this->roller->validate());

        $probabilities = [1 => 0.3, 2 => 0.2, 3 => 0.1, 4 => 0.4, 5 => 0.1];
        $this->roller->setProbabilities($probabilities);
        $this->assertFalse($this->roller->validate());

        $probabilities = [1 => 0.3, 2 => 0.2, 3 => 0.1, 4 => 0.6, 5 => 0.1];
        $this->roller->setProbabilities($probabilities);
        $this->assertFalse($this->roller->validate());
    }

    /**
     * @covers \Dice\AbstractRoller::getMaxRange
     * @throws \Exception
     */
    public function testGetMaxRange()
    {
        // Set normal probabilities
        $probabilities = [1 => 1];
        $this->roller->setProbabilities($probabilities);
        $this->assertEquals(10, $this->roller->getMaxRange());

        $probabilities = [1 => 0.5, 2 => 0.5];
        $this->roller->setProbabilities($probabilities);
        $this->assertEquals(10, $this->roller->getMaxRange());

        $probabilities = [1 => 0.55, 2 => 0.45];
        $this->roller->setProbabilities($probabilities);
        $this->assertEquals(100, $this->roller->getMaxRange());

        $probabilities = [1 => 0.555, 2 => 0.445];
        $this->roller->setProbabilities($probabilities);
        $this->assertEquals(1000, $this->roller->getMaxRange());

        $probabilities = [1 => 0.555, 2 => 0.440, 3 => 0.005];
        $this->roller->setProbabilities($probabilities);
        $this->assertEquals(1000, $this->roller->getMaxRange());
    }
}
