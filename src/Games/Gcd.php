<?php

namespace BrainGames\Games\Gcd;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\gameEngine as gameEngine;

function gcdGame(): void
{
    [$userName, $rounds] = gameEngine();
    line('Find the greatest common divisor of given numbers.');
    for ($i = 0; $i < $rounds; $i++) {
        $number1 = rand(1, 100);
        $number2 = rand(1, 100);
        $upperBorder = $number1 < $number2 ? $number1 : $number2;
        $greaterDiv = 1;
        for ($j = 2; $j <= $upperBorder; $j++) {
            if ($number1 % $j === 0 && $number2 % $j === 0) {
                $greaterDiv = $j;
            }
        }
        $answer = intval(prompt("Question: {$number1} {$number2}"), 10);
        line("Your answer: {$answer}");
        if ($answer === $greaterDiv) {
            line('Correct!');
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$greaterDiv}'");
            line("Let's try again, {$userName}");
            return;
        }
    }
    return;
}
