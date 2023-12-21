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
    // if (intval($answer, 10) === $greaterDiv) {
    //     line('Correct!');
    // } else {
    //     line("'{$answer}' is wrong answer ;(. Correct answer was '{$greaterDiv}'");
    //     line("Let's try again, {$userName}!");
    //     return;
    // }
    return [$greaterDiv, $number1, $number2];
}
