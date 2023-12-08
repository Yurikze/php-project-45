<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

function evenGame(string $userName)
{
    $winStreak = 0;
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $randomNumber = rand(0, 100);
    while ($winStreak < 3) {
        $answer = prompt("Question: {$randomNumber}");
        line("Your answer: {$answer}");
        $isEven = $randomNumber % 2 === 0;
        if ($isEven && $answer === 'yes' || !$isEven && $answer === 'no') {
            line('Correct!');
            $randomNumber = rand(0, 100);
            $winStreak += 1;
        } elseif ($isEven && $answer === 'no') {
            line("'no' is wrong answer ;(. Correct answer was 'yes'.");
            return line("Let's try again, {$userName}!");
        } else {
            line("'yes' is wrong answer ;(. Correct answer was 'no'.");
            return line("Let's try again, {$userName}!");
        }
    }
    return line("Congratulations, {$userName}!");
}
