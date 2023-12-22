<?php

namespace BrainGames\Games\Gcd;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\gameEngine as gameEngine;

function gcdGame(): array
{
    $number1 = rand(1, 100);
    $number2 = rand(1, 100);
    $upperBorder = $number1 < $number2 ? $number1 : $number2;
    $greaterDiv = 1;
    for ($j = 2; $j <= $upperBorder; $j++) {
        if ($number1 % $j === 0 && $number2 % $j === 0) {
            $greaterDiv = $j;
        }
    }
    return [$greaterDiv, $number1, $number2];
}

function gameRules(): string
{
    return 'Find the greatest common divisor of given numbers.';
}
