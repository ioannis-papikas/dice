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

use InvalidArgumentException;

/**
 * Class MTRand
 * @package Dice\Random
 */
class MTRand extends AbstractRandomizer
{
    /**
     * {@inheritdoc}
     */
    public function max()
    {
        return mt_getrandmax();
    }

    /**
     * {@inheritdoc}
     */
    public function min()
    {
        return 0;
    }

    /**
     * {@inheritdoc}
     */
    public function next($min, $max, $seed = null)
    {
        // Check range
        if ($min < $this->min() || $max > $this->max()) {
            throw new InvalidArgumentException(__METHOD__ . ': Given arguments are out of range.');
        }

        // Seed
        if (!is_null($seed)) {
            mt_srand($seed);
        }

        // Return a random number
        return mt_rand($min, $max);
    }
}
