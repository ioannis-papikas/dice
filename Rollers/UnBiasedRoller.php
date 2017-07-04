<?php

/*
 * This file is part of the Dice Package.
 *
 * (c) Ioannis Papikas <papikas.ioan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dice\Rollers;

use Dice\Helpers\NumberHelper;

/**
 * Class UnBiasedRoller
 * @package Dice\Rollers
 */
class UnBiasedRoller extends Roller
{
    /**
     * {@inheritdoc}
     */
    public function validate()
    {
        // Get probabilities
        $probabilities = $this->getProbabilities();

        // Check if the roller is unbiased
        $average = NumberHelper::average($this->getProbabilities());

        $unbiased = true;
        foreach ($probabilities as $probability) {
            $diff = abs($average - $probability);
            $unbiased = $unbiased && NumberHelper::equal($diff, 0, 10);
        }

        return parent::validate() && $unbiased;
    }
}
