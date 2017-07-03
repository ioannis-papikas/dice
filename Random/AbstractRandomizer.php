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
 * Class MTRand
 * @package Dice\Random
 */
abstract class AbstractRandomizer implements Randomizer
{
    /**
     * {@inheritdoc}
     */
    abstract public function max();

    /**
     * {@inheritdoc}
     */
    abstract public function min();

    /**
     * {@inheritdoc}
     */
    abstract public function next($min, $max, $seed = null);

    /**
     * @param float $min
     * @param float $max
     * @param mixed $seed
     *
     * @return float
     */
    public function __invoke($min, $max, $seed = null)
    {
        return $this->next($min, $max, $seed);
    }
}
