<?php

namespace BrainGames\Games\Calc;

function calcGame(): array
{
    $operators = ['+', '-', '*'];
    $correctAnswer = 0;
    $operator = $operators[rand(0, 2)];
    $randomNumber1 = rand(0, 10);
    $randomNumber2 = rand(0, 10);
    switch ($operator) {
        case '+':
            $correctAnswer = $randomNumber1 + $randomNumber2;
            break;
        case '-':
            $correctAnswer = $randomNumber1 - $randomNumber2;
            break;
        case '*':
            $correctAnswer = $randomNumber1 * $randomNumber2;
            break;
        default:
            break;
    }
    return [
        $correctAnswer,
        $randomNumber1,
        $randomNumber2,
        $operator
    ];
}

function gameRules(): string
{
    return 'What is the result of the expression?';
}