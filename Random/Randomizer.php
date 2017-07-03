<?php

namespace Dice\Random;

/**
 * Interface Randomizer
 */
interface Randomizer
{
    /**
     * @param float $min
     * @param float $max
     * @param mixed $seed
     *
     * @return float
     */
    public function randomize($min, $max, $seed = null);
}
