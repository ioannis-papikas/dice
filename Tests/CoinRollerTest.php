<?php

/*
 * This file is part of the Dice Package.
 *
 * (c) Ioannis Papikas <papikas.ioan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dice\Tests\Distributions;

use Dice\Distributions\CoinDistribution;
use Dice\Random\MTRand;
use Dice\Roller;
use PHPUnit_Framework_TestCase;

/**
 * Class DiceRollerTest
 * @package Dice\Tests\Distributions
 */
class CoinRollerTest extends PHPUnit_Framework_TestCase
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

        $this->roller = new Roller(new CoinDistribution(), new MTRand());
    }

    /**
     * @covers \Dice\Roller::roll
     * @throws \Exception
     * @throws \LogicException
     */
    public function testRoll()
    {
        echo $this->roller->roll() . "\n";
        echo $this->roller->roll() . "\n";
        echo $this->roller->roll() . "\n";
        echo $this->roller->roll() . "\n";
        echo $this->roller->roll() . "\n";
        echo $this->roller->roll() . "\n";
        echo $this->roller->roll() . "\n";
        echo $this->roller->roll() . "\n";
        echo $this->roller->roll() . "\n";
        echo $this->roller->roll() . "\n";
    }
}
