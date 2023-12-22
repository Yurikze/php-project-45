<?php

namespace BrainGames\Games\Progression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\gameEngine as gameEngine;

function progressionGame(): array
{
    $start = rand(0, 5);
    $step = rand(1, 5);
    $quantity = rand(5, 11);
    $hiddenIndex = rand(0, $quantity - 1);

    $progressionArr = range($start, $start + $step * ($quantity - 1), $step);
    $hiddenElement = $progressionArr[$hiddenIndex];
    $progressionArr[$hiddenIndex] = '..';
    $questionString = implode(' ', $progressionArr);

    return [$hiddenElement, $questionString];
}

function gameRules(): string
{
    return 'What number is missing in the progression?';
}
