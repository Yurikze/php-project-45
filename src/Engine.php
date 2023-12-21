<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;
use function BrainGames\Cli\greet;
use function BrainGames\Games\Calc\calcGame;
use function BrainGames\Games\Even\evenGame;
use function BrainGames\Games\Gcd\gcdGame;
use function BrainGames\Games\Prime\primeGame;
use function BrainGames\Games\Progression\progressionGame;

function gameEngine(string $gameName)
{
    $userName = greet();
    if ($gameName === 'calc') {
        line('What is the result of the expression?');
    } elseif ($gameName === 'even') {
        line('Answer "yes" if the number is even, otherwise answer "no".');
    } elseif ($gameName === 'gcd') {
        line('Find the greatest common divisor of given numbers.');
    } elseif ($gameName === 'prime') {
        line('Answer "yes" if given number is prime. Otherwise answer "no".');
    } elseif ($gameName === 'progression') {
        line('What number is missing in the progression?');
    }
    for ($i = 1; $i <= 3; $i++) {
        if ($gameName === 'calc') {
            [$correctAnswer, $num1, $num2, $operator] = calcGame();
            $userAnswer = prompt("Question: {$num1} {$operator} {$num2}");
        } elseif ($gameName === 'even') {
            [$correctAnswer, $randomNumber] = evenGame();
            $userAnswer = prompt("Question: {$randomNumber}");
        } elseif ($gameName === 'gcd') {
            [$correctAnswer, $num1, $num2] = gcdGame();
            $userAnswer = prompt("Question: {$num1} {$num2}");
        } elseif ($gameName === 'prime') {
            [$correctAnswer, $randomNumber] = primeGame();
            $userAnswer = prompt("Question: {$randomNumber}");
        } elseif ($gameName === 'progression') {
            [$correctAnswer, $questionString] = progressionGame();
            $userAnswer = prompt("Question: {$questionString}");
        }
        line("Your answer: {$userAnswer}");
        $userAnswer = gettype($correctAnswer) === 'integer' ? intval($userAnswer, 10) : $userAnswer;
        if ($userAnswer === $correctAnswer) {
            line('Correct!');
        } else {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'");
            line("Let's try again, {$userName}!");
            return;
        }
    }
    line("Congratulations, {$userName}!");
    return;
}
