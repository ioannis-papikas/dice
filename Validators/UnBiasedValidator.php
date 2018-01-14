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
 * Class UnBiasedValidator
 * This validator makes sure that all the probabilities are equal and
 * there are no options that have more probabilities than others.
 *
 * You can use this validator in case of standard cases where you always
 * need the options to have the same probabilities, like a Dice or a Coin.
 *
 * @package Dice\Validators
 */
class UnBiasedValidator extends AbstractValidator
{
    /**
     * @return bool
     */
    public function validate()
    {
        // Get items
        $items = $this->getItems();

        // Keep previous item for comparison
        $previousValue = null;
        foreach ($items as $value) {
            // Skip first value
            if (is_null($previousValue)) {
                continue;
            }

            /**
             * Check if values are equal.
             *
             * Also check if diff is less than a limit,
             * which is considered equal due to the precision of php
             */
            $equal = $value == $previousValue;
            $diff = abs($value - $previousValue);
            $unbiased = $equal && NumberHelper::equal($diff, 0, 10);
            if (!$unbiased) {
                return false;
            }

            // Set previous value
            $previousValue = $value;
        }

        return true;
    }
}
