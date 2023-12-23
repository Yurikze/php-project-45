<?php

namespace BrainGames\Games\Calc;

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

function gameCorrectAnswer(array $gameData): int
{
    [$randomNumber1, $randomNumber2, $operator] = $gameData;
    $correctAnswer = 0;
    switch ($operator) {
        case '+':
            return $correctAnswer = $randomNumber1 + $randomNumber2;
        case '-':
            return $correctAnswer = $randomNumber1 - $randomNumber2;
            break;
        case '*':
            return $correctAnswer = $randomNumber1 * $randomNumber2;
        default:
            return $correctAnswer;
    }
}

function gameQuestion(array $gameData): string
{
    [$randomNumber1, $randomNumber2, $operator] = $gameData;
    return "Question: {$randomNumber1} {$operator} {$randomNumber2}";
}
