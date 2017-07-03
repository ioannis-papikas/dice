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
use Dice\Random\Randomizer;
use Exception;
use LogicException;

/**
 * Class AbstractRoller
 * @package Dice
 */
abstract class AbstractRoller
{
    /**
     * @var Randomizer
     */
    protected $randomizer;

    /**
     * @return array
     */
    abstract public function getProbabilities();

    /**
     * AbstractRoller constructor.
     *
     * @param Randomizer $randomizer
     */
    public function __construct(Randomizer $randomizer)
    {
        $this->randomizer = $randomizer;
    }

    /**
     * @param float|null $seed
     *
     * @return mixed
     * @throws Exception
     * @throws LogicException
     */
    public function roll($seed = null)
    {
        // Validate probabilities
        if (!$this->validate()) {
            throw new LogicException(__METHOD__ . ': Probabilities do not sum up to 1.');
        }

        // Scale probabilities to have a better precision
        return $this->getRandomizer()->randomize(1, $this->getMaxRange(), $seed);
    }

    /**
     * @return bool
     */
    public function validate()
    {
        return array_sum($this->getProbabilities()) === 1 || array_sum($this->getProbabilities()) === 1.0;
    }

    /**
     * @return int
     * @throws Exception
     */
    public function getMaxRange()
    {
        // Initialize number of decimals
        $numbersOfDecimals = 1;

        // Get all cases with their probabilities
        $probabilities = $this->getProbabilities();
        foreach ($probabilities as $probability) {
            $probabilityNumberOfDecimals = NumberHelper::numberOfDecimals($probability);
            $numbersOfDecimals = $probabilityNumberOfDecimals > $numbersOfDecimals ? $probabilityNumberOfDecimals : $numbersOfDecimals;
        }

        // Convert number of decimals to power of 10 to get maximum number
        return pow(10, $numbersOfDecimals);
    }

    /**
     * @return Randomizer
     */
    public function getRandomizer(): Randomizer
    {
        return $this->randomizer;
    }

    /**
     * @param Randomizer $randomizer
     */
    public function setRandomizer(Randomizer $randomizer)
    {
        $this->randomizer = $randomizer;
    }
}
