<?php

namespace BrainGames\Games\Progression;

function gameRules(): string
{
    return 'What number is missing in the progression?';
}

function gameData(): array
{
    $start = rand(0, 5);
    $step = rand(1, 5);
    $quantity = rand(5, 11);
    $hiddenIndex = rand(0, $quantity - 1);
    $progressionArr = range($start, $start + $step * ($quantity - 1), $step);
    return [$progressionArr, $hiddenIndex];
}

function gameCorrectAnswer(array $gameData): int
{
    [$progressionArr, $hiddenIndex] = $gameData;
    $hiddenElement = $progressionArr[$hiddenIndex];
    return $hiddenElement;
}

function gameQuestion(array $gameData): string
{
    [$progressionArr, $hiddenIndex] = $gameData;
    $progressionArr[$hiddenIndex] = '..';
    $questionString = implode(' ', $progressionArr);
    return "Question: {$questionString}";
}
