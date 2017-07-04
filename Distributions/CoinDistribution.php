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
use Dice\Validators\Validator;

/**
 * Class CoinDistribution
 * @package Dice\Distributions
 */
class CoinDistribution extends AbstractDistribution
{
    /**
     * @var array|Validator[]
     */
    protected $validators;

    /**
     * @return mixed
     */
    public function getItems()
    {
        return [
            1 => 1 / 2,
            2 => 1 / 2,
        ];
    }

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
}