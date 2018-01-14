<?php

/*
 * This file is part of the Dice Package.
 *
 * (c) Ioannis Papikas <papikas.ioan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dice\Distributions;

use Dice\Validators\ProbabilityValidator;
use Dice\Validators\UnBiasedValidator;

/**
 * Class DiceDistribution
 * @package Dice\Distributions
 */
class DiceDistribution extends AbstractDistribution
{
    /**
     * CoinDistribution constructor.
     */
    public function __construct()
    {
        // Set validators
        $this->setValidators([
            new ProbabilityValidator(),
            new UnBiasedValidator(),
        ]);
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return [
            1 => 1 / 6,
            2 => 1 / 6,
            3 => 1 / 6,
            4 => 1 / 6,
            5 => 1 / 6,
            6 => 1 / 6,
        ];
    }
}
