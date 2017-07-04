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
 * Class AbstractValidator
 * @package Dice\Validators
 */
abstract class AbstractValidator implements ItemValidator
{
    /**
     * @var array
     */
    protected $items;

    /**
     * @return bool
     */
    abstract public function validate();

    /**
     * @param array $items
     */
    public function setItems(array $items)
    {
        $this->items = $items;
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }
}
