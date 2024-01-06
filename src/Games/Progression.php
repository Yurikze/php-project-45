<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\gameEngine;

use const BrainGames\Engine\GAME_ROUNDS;

function gameRules(): string
{
    return 'What number is missing in the progression?';
}

function gameData(): array
{
    $start = rand(0, 5);
    $step = rand(1, 5);
    $length = rand(5, 11);
    $progression = generateProgression($start, $step, $length);
    $hiddenIndex = rand(0, $length - 1);
    return [$progression, $hiddenIndex];
}

function generateProgression(int $start, int $step, int $length)
{
    $progression = range($start, $start + $step * ($length - 1), $step);
    return $progression;
}

function gameCorrectAnswer(array $gameData): string
{
    [$progression, $hiddenIndex] = $gameData;
    $hiddenElement = $progression[$hiddenIndex];
    return strval($hiddenElement);
}

function gameQuestion(array $gameData): string
{
    [$progression, $hiddenIndex] = $gameData;
    $progression[$hiddenIndex] = '..';
    $questionString = implode(' ', $progression);
    return "Question: {$questionString}";
}

function generateGameData()
{
    $roundsData = [];
    $gameRules = gameRules();
    for ($i = 0; $i < GAME_ROUNDS; $i += 1) {
        $roundData = gameData();
        $roundQuestion = gameQuestion($roundData);
        $roundCorrectAnswer = gameCorrectAnswer($roundData);
        $roundsData[] = [$roundQuestion, $roundCorrectAnswer];
    }
    return [$gameRules, $roundsData];
}

function game()
{
    $gameData = generateGameData();
    gameEngine($gameData);
}
