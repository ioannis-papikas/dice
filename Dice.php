<?php

/*
 * This file is part of the Dice Package.
 *
 * (c) Ioannis Papikas <papikas.ioan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dice;

use Dice\Helpers\NumberHelper;

/**
 * Class Dice
 * @package Dice
 */
class Dice extends Roller
{
    /**
     * @param array $probabilities
     */
    public function setProbabilities(array $probabilities)
    {
        $this->probabilities = $probabilities;
    }

    /**
     * {@inheritdoc}
     */
    public function validate()
    {
        // Get probabilities
        $probabilities = $this->getProbabilities();

        // Check if case count is 6 (as a normal dice)
        $six = count($probabilities) === 6;

        // Check if the dice is unbiased
        $average = NumberHelper::average($this->getProbabilities());
        $equal = true;
        foreach ($probabilities as $probability) {
            $equal = $equal && ($probability == $average);
        }

        return parent::validate() && $six && $equal;
    }
}
