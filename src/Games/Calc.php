<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\gameEngine;

use const BrainGames\Engine\GAME_ROUNDS;

function gameRules(): string
{
    return 'What is the result of the expression?';
}

function gameData(): array
{
    $operators = ['+', '-', '*'];
    $operator = $operators[rand(0, 2)];
    $randomNumber1 = rand(0, 10);
    $randomNumber2 = rand(0, 10);
    return [$randomNumber1, $randomNumber2, $operator];
}

function calc(array $gameData): int
{
    [$number1, $number2, $operator] = $gameData;
    $result = 0;
    switch ($operator) {
        case '+':
            return $result = $number1 + $number2;
        case '-':
            return $result = $number1 - $number2;
        case '*':
            return $result = $number1 * $number2;
        default:
            return $result;
    }
}

function gameCorrectAnswer(array $gameData): string
{
    return strval(calc($gameData));
}

function gameQuestion(array $gameData): string
{
    [$randomNumber1, $randomNumber2, $operator] = $gameData;
    return "Question: {$randomNumber1} {$operator} {$randomNumber2}";
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
