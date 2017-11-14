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

use Dice\Validators\ProbabilityValidator;
use PHPUnit\Framework\TestCase;

/**
 * Class UnBiasedValidatorTest
 * @package Dice\Tests\Validators
 */
class ProbabilityValidatorTest extends TestCase
{
    /**
     * @var ProbabilityValidator
     */
    protected $validator;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();

        $this->validator = new ProbabilityValidator();
    }

    /**
     * @covers \Dice\Validators\ProbabilityValidator::validate
     *
     * @throws \PHPUnit\Framework\AssertionFailedError
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
            1 => 0.3,
            2 => 0.2,
            3 => 0.1,
            4 => 0.4,
        ];
        $this->validator->setItems($probabilities);
        $this->assertTrue($this->validator->validate());

        $probabilities = [
            1 => 0.3,
            2 => 0.2,
            3 => 0.1,
            4 => 0.4,
        ];
        $this->validator->setItems($probabilities);
        $this->assertTrue($this->validator->validate());

        $probabilities = [
            1 => 0.3,
            2 => 0.2,
            3 => 0.1,
            4 => 0.4,
            5 => 0.1,
        ];
        $this->validator->setItems($probabilities);
        $this->assertFalse($this->validator->validate());

        $probabilities = [
            1 => 0.3,
            2 => 0.2,
            3 => 0.1,
            4 => 0.6,
            5 => 0.1,
        ];
        $this->validator->setItems($probabilities);
        $this->assertFalse($this->validator->validate());

        $probabilities = [
            1 => 0.1666666666666667,
            2 => 0.1666666666666667,
            3 => 0.1666666666666667,
            4 => 0.1666666666666667,
            5 => 0.1666666666666667,
            6 => 0.1666666666666667,
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
