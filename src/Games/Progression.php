<?php

namespace BrainGames\Games\Progression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\gameEngine as gameEngine;

function progressionGame(): void
{
    [$userName, $rounds] = gameEngine();
    line('What number is missing in the progression?');
    for ($i = 1; $i <= $rounds; $i++) {
        $start = rand(0, 5);
        $step = rand(1, 5);
        $quantity = rand(5, 11);
        $hiddenIndex = rand(0, $quantity - 1);
        $hiddenIndex = 4;

        $progressionArr = range($start, $start + $step * ($quantity - 1), $step);
        $hiddenElement = $progressionArr[$hiddenIndex];
        $progressionArr[$hiddenIndex] = '..';
        $questionString = implode(' ', $progressionArr);

        $answer = prompt("Question: {$questionString}");
        line("Your answer: {$answer}");

        if (intval($answer, 10) === $hiddenElement) {
            line('Correct!');
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$hiddenElement}'.");
            line("Let's try again, {$userName}!");
            return;
        }
    }
    line("Congratulations, {$userName}!");
    return;
}
