<?php

namespace BrainGames\Games\Prime;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\gameEngine as gameEngine;

function primeGame(): void
{
    [$userName, $rounds] = gameEngine();
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    for ($i = 1; $i <= $rounds; $i++) {

        $randomNumber = rand(2, 20);
        $isPrime = true;
        for ($j = 2; $j <= $randomNumber; $j++) {
            if ($randomNumber % $j === 0 && $j !== $randomNumber) {
                $isPrime = false;
            }
        }

        $answer = prompt("Question: {$randomNumber}");
        line("Your answer: {$answer}");

        if ($answer === 'yes' && $isPrime || $answer === 'no' && !$isPrime) {
            line('Correct!');
        } elseif ($isPrime && $answer !== 'yes') {
            line("'{$answer}' is wrong answer ;(. Correct answer was 'yes'.");
            line("Let's try again, {$userName}!");
            return;
        } elseif (!$isPrime && $answer !== 'no') {
            line("'{$answer}' is wrong answer ;(. Correct answer was 'no'.");
            line("Let's try again, {$userName}!");
            return;
        }
    }
    line("Congratulations, {$userName}!");
    return;
}
