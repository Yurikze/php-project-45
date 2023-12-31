<?php

namespace BrainGames\Games\Gcd;

const GAME_RULES = 'Find the greatest common divisor of given numbers.';

function gameData(): array
{
    $number1 = rand(1, 100);
    $number2 = rand(1, 100);
    return [$number1, $number2];
}

function fingGcd(array $data): int
{
    [$number1, $number2] = $data;
    $upperBorder = $number1 < $number2 ? $number1 : $number2;
    $greaterCommonDivisior = 1;
    for ($j = 2; $j <= $upperBorder; $j++) {
        if ($number1 % $j === 0 && $number2 % $j === 0) {
            $greaterCommonDivisior = $j;
        }
    }
    return $greaterCommonDivisior;
}

function gameCorrectAnswer(array $gameData): string
{
    return strval(fingGcd($gameData));
}

function gameQuestion(array $gameData): string
{
    [$number1, $number2] = $gameData;
    return "Question: {$number1} {$number2}";
}

function generateRoundData()
{
    $roundData = gameData();
    $roundQuestion = gameQuestion($roundData);
    $roundCorrectAnswer = gameCorrectAnswer($roundData);
    return [$roundQuestion, $roundCorrectAnswer];
}
