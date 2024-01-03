<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Cli\greet;
use function BrainGames\Engine\gameEngine;
use function cli\line;

function gameRules(): string
{
    return 'What number is missing in the progression?';
}

function gameData(): array
{
    $start = rand(0, 5);
    $step = rand(1, 5);
    $length = rand(5, 11);
    $hiddenIndex = rand(0, $length - 1);
    return [$start, $step, $length, $hiddenIndex];
}

function generateProgression(int $start, int $step, int $length)
{
    $progression = range($start, $start + $step * ($length - 1), $step);
    return $progression;
}

function gameCorrectAnswer(array $progression, int $hiddenIndex): int
{
    $hiddenElement = $progression[$hiddenIndex];
    return strval($hiddenElement);
}

function gameQuestion(array $progression, int $hiddenIndex): string
{
    $progression[$hiddenIndex] = '..';
    $questionString = implode(' ', $progression);
    return "Question: {$questionString}";
}

function game(): void
{
    $userName = greet();
    $gameRules = gameRules();
    line($gameRules);
    for ($i = 0; $i < 3; $i++) {
        [$start, $step, $length, $hiddenIndex] = gameData();
        $roundProgression = generateProgression($start, $step, $length);
        $roundQuestion = gameQuestion($roundProgression, $hiddenIndex);
        $roundCorrectAnswer = gameCorrectAnswer($roundProgression, $hiddenIndex);
        $roundCompleted = gameEngine($userName, $roundQuestion, $roundCorrectAnswer);
        if (!$roundCompleted) {
            return;
        }
    }
    line("Congratulations, {$userName}!");
    return;
}
