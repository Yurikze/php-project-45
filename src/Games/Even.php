<?php

namespace BrainGames\Games\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\gameEngine as gameEngine;

function evenGame(): void
{
    [$userName, $rounds] = gameEngine();
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 1; $i <= $rounds; $i++) {
        $randomNumber = rand(1, 100);
        $answer = prompt("Question: {$randomNumber}");
        line("Your answer: {$answer}");
        $isEven = $randomNumber % 2 === 0;
        if ($isEven && $answer === 'yes' || !$isEven && $answer === 'no') {
            line('Correct!');
        } elseif ($isEven && $answer === 'no') {
            line("'no' is wrong answer ;(. Correct answer was 'yes'.");
            line("Let's try again, {$userName}!");
            return;
        } else {
            line("'yes' is wrong answer ;(. Correct answer was 'no'.");
            line("Let's try again, {$userName}!");
            return;
        }
    }
    line("Congratulations, {$userName}!");
    return;
}
