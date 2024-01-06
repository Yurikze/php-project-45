<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\gameEngine;

use const BrainGames\Engine\GAME_ROUNDS;

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

function generateGameData()
{
    $roundsData = [];
    $gameRules = gameRules();
    for ($i = 0; $i < GAME_ROUNDS; $i += 1) {
        $roundData = gameData();
        $roundQuestion = gameQuestion($roundData);
        $roundCorrectAnswer = gameCorrectAnswer($roundData);
        $roundsData[] = [$roundQuestion, $roundCorrectAnswer];
    }
    return [$gameRules, $roundsData];
}

function game()
{
    $gameData = generateGameData();
    gameEngine($gameData);
}
