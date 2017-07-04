<?php

/*
 * This file is part of the Dice Package.
 *
 * (c) Ioannis Papikas <papikas.ioan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dice\Distributions;

use Dice\Validators\Validator;

/**
 * Class AbstractDistribution
 * @package Dice\Distributions
 */
abstract class AbstractDistribution implements Distribution
{
    /**
     * @var array|Validator[]
     */
    protected $validators = [];

    /**
     * @return mixed
     */
    abstract public function getItems();

    /**
     * @return array|Validator[]
     */
    public function getValidators()
    {
        return $this->validators;
    }

    /**
     * @param array|Validator[] $validators
     *
     * @return AbstractDistribution
     */
    public function setValidators($validators)
    {
        $this->validators = $validators;

        return $this;
    }

    /**
     * @param Validator $validator
     *
     * @return array|Validator[]
     */
    public function pushValidator(Validator $validator)
    {
        array_unshift($this->validators, $validator);

        return $this->getValidators();
    }

    /**
     * @return array|Validator[]
     */
    public function popValidator()
    {
        array_shift($this->validators);

        return $this->getValidators();
    }

    /**
     * @return bool
     */
    public function validate()
    {
        foreach ($this->getValidators() as $validator) {
            // Set items
            $validator->setItems($this->getItems());

            // Validate
            if (!$validator->validate()) {
                return false;
            }
        }

        return true;
    }
}
