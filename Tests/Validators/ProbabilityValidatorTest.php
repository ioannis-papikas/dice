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
        $counters = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 30, 50, 75, 100];
        foreach ($counters as $counter) {
            $probabilities = [];
            for ($i = 0; $i < $counter; $i++) {
                $probabilities[] = 1 / $counter;
            }
            $this->validator->setItems($probabilities);
            $this->assertTrue($this->validator->validate());
        }
    }
}
