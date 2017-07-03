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
 * Interface Randomizer
 */
interface Randomizer
{
    /**
     * @return mixed
     */
    public function max();

    /**
     * @return mixed
     */
    public function min();

    /**
     * @param float $min
     * @param float $max
     * @param mixed $seed
     *
     * @return float
     */
    public function next($min, $max, $seed = null);
}
