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

        // Check if the roller is unbiased
        $average = NumberHelper::average($items);

        $unbiased = true;
        foreach ($items as $value) {
            $diff = abs($average - $value);
            $unbiased = $unbiased && NumberHelper::equal($diff, 0, 10);
        }

        return $unbiased;
    }
}
