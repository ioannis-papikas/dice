# Dice

Dice allows you to pick an option from a given pool with a given set of probabilities.

[![StyleCI](https://styleci.io/repos/96127861/shield?branch=1.0)](https://styleci.io/repos/96127861)
[![Latest Stable Version](https://poser.pugx.org/ipapikas/dice/v/stable?format=flat-square)](https://packagist.org/packages/ipapikas/dice)
[![Total Downloads](https://poser.pugx.org/ipapikas/dice/downloads?format=flat-square)](https://packagist.org/packages/ipapikas/dice)
[![License](https://poser.pugx.org/ipapikas/dice/license?format=flat-square)](https://packagist.org/packages/ipapikas/dice)

- [Introduction](#introduction)
- [Installation](#installation)
  - [Through the composer](#through-the-composer)
- [How It Works](#how-it-works)
- [Distributions](#distributions)

## Introduction

Dice is a basic library that offers a random handler for simulating the throw of a Dice.
In other words, it allows you to choose an option from a given set of options with specified probabilities.

Dice provides a set of Distributions and Randomizers to allow you to select your own.
You can select Distributions that have equal probabilities (Dice, Coin etc.) or build your own Distributions
that might not have the same probabilities, depending on the usage.

Dice is still in **beta** version and we are making extended tests and use cases to validate its use and create a stable version. 

## Installation

You can install Dice simply by adding the files into your project or using the composer.

### Through the composer

Add the following line to your `composer.json` file:

```
"ipapikas/dice": "^1.0"
```

## Roller

Dice includes a main Roller that receives a Distribution and a Randomizer and selects the next value of the given Distribution.

Example:
```php
use \Dice\Distributions\CoinDistribution;
use \Dice\Random\MTRand;
use \Dice\Roller;

// Create new Distribution
$coin = new CoinDistribution();

// Create a new Randomizer
$randomizer = new MTRand();

// Create new Roller
$roller = new Roller($coin, $randomizer);

// "Roll" the Dice and get the next item from the distribution
// In this example, the value can be either 1 (Head) or 2 (Tail),
// based on the Distribution
$value = $roller->roll();
```

## How It Works

Roller has the main logic of the library here.
Roller is the main handler that is responsible for taking the next value of the distribution and making
sure that there is enough logic to be able to choose among a set of values.

Roller's work is to take all value possibilities and expand them into a world where there are 100 (or 1000 or more) pebbles.
Based on the probability distribution, the Roller selects a specific number of pebbles and colors them with the value of the Distribution.
Based on the probability, it selects the right amount of pebbles in order to allow the the Distribution to be biased or unbiased.
After the expansion is over, it uses the Randomizer to select a pebble from 1 to 100 (or 1000 or more).
Since the pebbles are a lot more than the values in the Distribution, we can make sure that it can work without making any biased decisions
or leaving anything out.

**Pebbles**

The number of pebbles is determined based on the amount of precision is needed for the given probabilities.

If the probabilities are just 50% each, 10 pebbles are enough to choose a number between 1 and 10 and determine
which pebbles are which value.

If the probabilities are in as low as 1.5%, the amount of pebbles will be 1000, to allow 1.5% to be seen a 15 pebbles at least. 

**Keep in mind**

Based on the description above, the amount of pebbles is determined by the amount of precision.

It is essential to build your Distributions to use `ProbabilityValidator` to make sure that your probabilities sum up to 1.
Otherwise, Roller will not be able to select properly your values and it will leave some cases (pebbles) out.

For example, if you have the following probabilities:
* 10%
* 15%
* 25%
* 30%
* 10%
* 15%

The above sum up to 105% (or 1.05). The amount of pebbles will be set to 100, leaving out 5 pebbles for the last probability,
which will be capped to the following: 
* 10%
* 15%
* 25%
* 30%
* 10%
* **10%**

Or there are cases where a value might be removed from the pebble pool, because it was completely above 1.
Example: 
* 10%
* 15%
* 25%
* 30%
* 20%
* **10%** -> This probability will be excluded completely

## Distributions

You can easily create your own distribution that will match your needs.
All you have to do is to setup your validators, if any.

In your code, you can set your own items as dynamic values based on your own logic.

Example:
```php
use Dice\Distributions\AbstractDistribution;
use Dice\Validators\ProbabilityValidator;
use Dice\Validators\UnBiasedValidator;

/**
 * Class WeatherDistribution
 */
class WeatherDistribution extends AbstractDistribution
{
    const SUNNY = 1;
    const RAIN = 2;
    const CLOUDY = 3;
    const SNOW = 4;

    /**
     * WeatherDistribution constructor.
     */
    public function __construct()
    {
        // Set validators
        $this->setValidators([
            new ProbabilityValidator(),
            new UnBiasedValidator(),
        ]);
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return [
            self::SUNNY => 1 / 4,
            self::RAIN => 1 / 4,
            self::CLOUDY => 1 / 4,
            self::SNOW => 1 / 4,
        ];
    }
}
```

If you are developing a game, you can build the above Distribution to decide
what the weather be like every single day.

Or, you can set the Distribution to be biased and be more rainy than usual
(66% chance of rain and 11% of any other weather):
```php
use Dice\Distributions\AbstractDistribution;
use Dice\Validators\ProbabilityValidator;

/**
 * Class SunnyWeatherDistribution
 */
class SunnyWeatherDistribution extends AbstractDistribution
{
    const SUNNY = 1;
    const RAIN = 2;
    const CLOUDY = 3;
    const SNOW = 4;

    /**
     * SunnyWeatherDistribution constructor.
     */
    public function __construct()
    {
        // Set validators
        $this->setValidators([
            new ProbabilityValidator(),
        ]);
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return [
            self::SUNNY => 1 / 9,
            self::RAIN => 2 / 3,
            self::CLOUDY => 1 / 9,
            self::SNOW => 1 / 9,
        ];
    }
}
```
