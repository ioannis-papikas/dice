<?php

/*
 * This file is part of the Dice Package.
 *
 * (c) Ioannis Papikas <papikas.ioan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dice\Validators;

/**
 * Interface Validator
 * @package Dice\Validators
 */
interface Validator
{
    /**
     * @return bool
     */
    public function validate();
}
