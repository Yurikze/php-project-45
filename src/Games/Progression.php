<?php

namespace BrainGames\Games\Progression;

const GAME_RULES = 'What number is missing in the progression?';

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

function generateRoundData()
{
    $roundData = gameData();
    $roundQuestion = gameQuestion($roundData);
    $roundCorrectAnswer = gameCorrectAnswer($roundData);
    return [$roundQuestion, $roundCorrectAnswer];
}
