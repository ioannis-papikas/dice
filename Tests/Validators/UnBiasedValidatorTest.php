<?php

/*
 * This file is part of the Dice Package.
 *
 * (c) Ioannis Papikas <papikas.ioan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dice\Tests\Validators;

use Dice\Validators\UnBiasedValidator;
use PHPUnit_Framework_TestCase;

/**
 * Class UnBiasedValidatorTest
 * @package Dice\Tests\Validators
 */
class UnBiasedValidatorTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var UnBiasedValidator
     */
    protected $validator;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();

        $this->validator = new UnBiasedValidator();
    }

    /**
     * @covers \Dice\Validators\UnBiasedValidator::validate
     * @throws \PHPUnit_Framework_AssertionFailedError
     */
    public function testValidate()
    {
        // Set normal probabilities
        $probabilities = [
            1 => 1,
        ];
        $this->validator->setItems($probabilities);
        $this->assertTrue($this->validator->validate());

        $probabilities = [
            1 => 0.5,
            2 => 0.5,
        ];
        $this->validator->setItems($probabilities);
        $this->assertTrue($this->validator->validate());

        $probabilities = [
            1 => 1 / 4,
            2 => 1 / 4,
            3 => 1 / 4,
            4 => 1 / 4,
        ];
        $this->validator->setItems($probabilities);
        $this->assertTrue($this->validator->validate());

        $probabilities = [
            1 => 1 / 5,
            2 => 1 / 5,
            3 => 1 / 5,
            4 => 1 / 5,
            5 => 1 / 5,
        ];
        $this->validator->setItems($probabilities);
        $this->assertTrue($this->validator->validate());

        $probabilities = [
            1 => 1 / 6,
            2 => 1 / 6,
            3 => 1 / 6,
            4 => 1 / 6,
            5 => 1 / 6,
            6 => 1 / 6,
        ];
        $this->validator->setItems($probabilities);
        $this->assertTrue($this->validator->validate());

        $probabilities = [
            1 => 1 / 10,
            2 => 1 / 10,
            3 => 1 / 10,
            4 => 1 / 10,
            5 => 1 / 10,
            6 => 1 / 10,
            7 => 1 / 10,
            8 => 1 / 10,
            9 => 1 / 10,
            10 => 1 / 10,
        ];
        $this->validator->setItems($probabilities);
        $this->assertTrue($this->validator->validate());
    }
}
