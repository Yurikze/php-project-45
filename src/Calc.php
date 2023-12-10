<?php

namespace BrainGames\Calc;

use function cli\line;
use function cli\prompt;

function calcGame(string $userName)
{
    $winStreak = 0;
    line('What is the result of the expression?');
    $operators = ['+', '-', '*'];
    $currentOperator = $operators[rand(0, 2)];
    $randomNumber1 = rand(0, 10);
    $randomNumber2 = rand(0, 10);
    $result = 0;
    while ($winStreak < 3) {
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
            $winStreak += 1;
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$result}'");
            line("Let's try again, {$userName}");
            return;
        }
    }
}
