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

use Dice\Distributions\DiceDistribution;
use Dice\Random\MTRand;
use Dice\Roller;
use PHPUnit\Framework\TestCase;

/**
 * Class DiceRollerTest
 * @package Dice\Tests\Distributions
 */
class DiceRollerTest extends TestCase
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

        $this->roller = new Roller(new DiceDistribution(), new MTRand());
    }

    /**
     * @covers \Dice\Roller::roll
     * @throws \Exception
     */
    public function testRoll()
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertNotNull($this->roller->roll());
        }
    }
}
