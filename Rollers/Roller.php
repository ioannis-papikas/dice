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

/**
 * Class Roller
 * @package Dice\Rollers
 */
class Roller extends AbstractRoller
{
    /**
     * @var array
     */
    protected $probabilities = [];

    /**
     * @return array
     */
    public function getProbabilities(): array
    {
        return $this->probabilities;
    }

    /**
     * @param array $probabilities
     */
    public function setProbabilities(array $probabilities)
    {
        $this->probabilities = $probabilities;
    }
}
