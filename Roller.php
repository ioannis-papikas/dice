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

use Dice\Distributions\Distribution;
use Dice\Exceptions\DistributionException;
use Dice\Helpers\NumberHelper;
use Dice\Random\Randomizer;
use Dice\Validators\Validator;
use InvalidArgumentException;

/**
 * Class Roller
 * @package Dice
 */
class Roller implements Validator
{
    /**
     * @var Distribution
     */
    protected $distribution;

    /**
     * @var Randomizer
     */
    protected $randomizer;

    /**
     * Roller constructor.
     *
     * @param Distribution $distribution
     * @param Randomizer   $randomizer
     */
    public function __construct(Distribution $distribution, Randomizer $randomizer)
    {
        $this->distribution = $distribution;
        $this->randomizer = $randomizer;
    }

    /**
     * @param float|null $seed
     * @param mixed      $default
     *
     * @return int|string|null|mixed
     * @throws DistributionException
     */
    public function roll($seed = null, $default = null)
    {
        // Validate distribution
        if (!$this->validate()) {
            throw new DistributionException(__METHOD__ . ': Distribution is not valid.');
        }

        // Scale probabilities to have a better precision and get random
        $maxRange = $this->getMaxRange();
        $random = $this->getRandomizer()->next(1, $maxRange, $seed);

        // Check which item was met
        $base = 1;
        foreach ($this->distribution->getItems() as $value => $probability) {
            $upperBound = $base + (int)NumberHelper::floor($probability * $maxRange);
            if ($random >= $base && $random <= $upperBound) {
                return $value;
            }

            $base = $upperBound + 1;
        }

        // If no value is met, return default value
        return $default;
    }

    /**
     * @return bool
     */
    public function validate()
    {
        return $this->distribution->validate();
    }

    /**
     * @return int
     */
    public function getMaxRange()
    {
        // Initialize number of decimals
        $numbersOfDecimals = 1;

        // Get all cases with their probabilities
        $probabilities = $this->getDistribution()->getItems();
        foreach ($probabilities as $probability) {
            try {
                $probabilityNumberOfDecimals = NumberHelper::numberOfDecimals($probability);
            } catch (InvalidArgumentException $ex) {
                $probabilityNumberOfDecimals = 1;
            }
            $numbersOfDecimals = $probabilityNumberOfDecimals > $numbersOfDecimals ? $probabilityNumberOfDecimals : $numbersOfDecimals;
        }

        // Convert number of decimals to power of 10 to get maximum number
        $maxRange = pow(10, $numbersOfDecimals);

        // Check given max range against randomizer max range
        return $maxRange > $this->getRandomizer()->max() ? $this->getRandomizer()->max() : $maxRange;
    }

    /**
     * @return Distribution
     */
    public function getDistribution()
    {
        return $this->distribution;
    }

    /**
     * @param Distribution $distribution
     */
    public function setDistribution(Distribution $distribution)
    {
        $this->distribution = $distribution;
    }

    /**
     * @return Randomizer
     */
    public function getRandomizer()
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
