<?php

/*
 * This file is part of the Dice Package.
 *
 * (c) Ioannis Papikas <papikas.ioan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dice\Helpers;

use Exception;

/**
 * Class NumberHelper
 * @package Dice\Helpers
 */
class NumberHelper
{
    /**
     * Calculate the floor of a number including decimals.
     * It has the same functionality as floor() but it can also include decimals.
     *
     * @param float $number    The float number to round.
     * @param int   $precision The number of decimals to include.
     *
     * @return float
     */
    public static function floor($number, $precision = 0)
    {
        $decimals = pow(10, $precision);

        return floor($number * $decimals) / $decimals;
    }

    /**
     * @param $array
     *
     * @return bool|float
     */
    public static function average($array)
    {
        if (!is_array($array) || empty($array)) {
            return false;
        }

        return array_sum($array) / count($array);
    }

    /**
     * Count the number of decimals that the given number has.
     *
     * @param $value
     *
     * @return int
     * @throws Exception
     */
    public static function numberOfDecimals($value)
    {
        // Check if value is not numeric
        if (!is_numeric($value)) {
            throw new Exception(__METHOD__ . ': ' . $value . ' is not a number!');
        }

        if ((int)$value == $value) {
            return 0;
        }

        return strlen($value) - strrpos($value, '.') - 1;
    }
}
