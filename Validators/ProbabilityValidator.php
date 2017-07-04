<?php

/*
 * This file is part of the Dice Package.
 *
 * (c) Ioannis Papikas <papikas.ioan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dice\Validators;

use Dice\Helpers\NumberHelper;

/**
 * Class ProbabilityValidator
 * @package Dice\Validators
 */
class ProbabilityValidator extends AbstractValidator
{
    /**
     * @return bool
     */
    public function validate()
    {
        // Get sum and diff
        $sum = array_sum($this->getItems());
        $diff = abs($sum - 1);

        // Check if sum is exactly 1
        $equal = (float)$sum === 1.0 || $sum === 1;

        /**
         * Check if diff is less than a limit
         * This functionality helps probabilities that do not
         * sum up exactly at 1 but there is a margin of error.
         */
        $closeToEqual = NumberHelper::floor($diff, 10) == 0;

        return $equal || $closeToEqual;
    }
}
