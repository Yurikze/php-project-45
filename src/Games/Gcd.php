<?php

namespace BrainGames\Games\Gcd;

function gameRules(): string
{
    return 'Find the greatest common divisor of given numbers.';
}

function gameData(): array
{
    $number1 = rand(1, 100);
    $number2 = rand(1, 100);
    return [$number1, $number2];
}

function gameCorrectAnswer(array $gameData): int
{
    [$number1, $number2] = $gameData;
    $upperBorder = $number1 < $number2 ? $number1 : $number2;
    $greaterDiv = 1;
    for ($j = 2; $j <= $upperBorder; $j++) {
        if ($number1 % $j === 0 && $number2 % $j === 0) {
            $greaterDiv = $j;
        }
    }
    return $greaterDiv;
}

function gameQuestion(array $gameData): string
{
    [$number1, $number2] = $gameData;
    return "Question: {$number1} {$number2}";
}
