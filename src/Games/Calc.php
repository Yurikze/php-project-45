<?php

namespace BrainGames\Games\Calc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\gameEngine as gameEngine;

function calcGame(): void
{
    [$userName, $rounds] = gameEngine();
    line('What is the result of the expression?');
    $operators = ['+', '-', '*'];
    for ($i = 0; $i < $rounds; $i++) {
        $result = 0;
        $currentOperator = $operators[rand(0, 2)];
        $randomNumber1 = rand(0, 10);
        $randomNumber2 = rand(0, 10);
        $answer = intval(prompt("Question: {$randomNumber1} {$currentOperator} {$randomNumber2}"), 10);
        line("Your answer: {$answer}");
        switch ($currentOperator) {
            case '+':
                $result = $randomNumber1 + $randomNumber2;
                break;
            case '-':
                $result = $randomNumber1 - $randomNumber2;
                break;
            case '*':
                $result = $randomNumber1 * $randomNumber2;
                break;
            default:
                break;
        }
        if ($result === $answer) {
            line('Correct!');
            $currentOperator = $operators[rand(0, 2)];
            $randomNumber1 = rand(0, 10);
            $randomNumber2 = rand(0, 10);
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$result}'");
            line("Let's try again, {$userName}");
            return;
        }
    }
    line("Congratulations, {$userName}!");
    return;
}
