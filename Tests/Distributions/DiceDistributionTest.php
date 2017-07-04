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
use PHPUnit_Framework_TestCase;

/**
 * Class CoinDistributionTest
 * @package Dice\Tests\Distributions
 */
class DiceDistributionTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var DiceDistribution
     */
    protected $distribution;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();

        $this->distribution = new DiceDistribution();
    }

    /**
     * @covers \Dice\Distributions\AbstractDistribution::validate
     * @throws \PHPUnit_Framework_AssertionFailedError
     */
    public function testValidate()
    {
        $this->assertTrue($this->distribution->validate());
    }
}
