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
use PHPUnit\Framework\TestCase;

/**
 * Class CoinDistributionTest
 * @package Dice\Tests\Distributions
 */
class CoinDistributionTest extends TestCase
{
    /**
     * @var CoinDistribution
     */
    protected $distribution;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();

        $this->distribution = new CoinDistribution();
    }

    /**
     * @covers \Dice\Distributions\AbstractDistribution::validate
     *
     * @throws \PHPUnit\Framework\AssertionFailedError
     */
    public function testValidate()
    {
        $this->assertTrue($this->distribution->validate());
    }
}
