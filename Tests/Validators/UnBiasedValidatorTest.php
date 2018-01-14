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
use PHPUnit\Framework\TestCase;

/**
 * Class UnBiasedValidatorTest
 * @package Dice\Tests\Validators
 */
class UnBiasedValidatorTest extends TestCase
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
     *
     * @throws \PHPUnit\Framework\AssertionFailedError
     */
    public function testValidate()
    {
        // Create a random constant
        $constant = rand(1, 100) / rand(1, 100);

        // Generate probabilities and test
        $counters = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 30, 50, 75, 100];
        foreach ($counters as $counter) {
            $probabilities = [];
            for ($i = 0; $i < $counter; $i++) {
                $probabilities[] = $constant;
            }
            $this->validator->setItems($probabilities);
            $this->assertTrue($this->validator->validate());
        }
    }
}
