<?php

/*
 * This file is part of the Dice Package.
 *
 * (c) Ioannis Papikas <papikas.ioan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dice\Random;

/**
 * Class MtRand
 * @package Dice\Random
 */
class MtRand implements Randomizer
{
    /**
     * @param float $min
     * @param float $max
     * @param mixed $seed
     *
     * @return float
     */
    public function randomize($min, $max, $seed = null)
    {
        // Seed
        mt_srand($seed);

        // Return a random number
        return mt_rand($min, $max);
    }
}
