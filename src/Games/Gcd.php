<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Cli\greet;
use function BrainGames\Engine\gameEngine;
use function cli\line;

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

function game(): void
{
    $userName = greet();
    $gameRules = gameRules();
    line($gameRules);
    for ($i = 0; $i < 3; $i++) {
        $roundData = gameData();
        $roundQuestion = gameQuestion($roundData);
        $roundCorrectAnswer = gameCorrectAnswer($roundData);
        $roundCompleted = gameEngine($userName, $roundQuestion, $roundCorrectAnswer);
        if (!$roundCompleted) {
            return;
        }
    }
    line("Congratulations, {$userName}!");
    return;
}
