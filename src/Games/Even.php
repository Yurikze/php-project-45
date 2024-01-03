<?php

namespace BrainGames\Games\Even;

use function cli\line;
use function BrainGames\Cli\greet;
use function BrainGames\Engine\gameEngine;

function gameRules(): string
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}

function gameData(): int
{
    return rand(1, 100);
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function gameCorrectAnswer(int $randomNumber): string
{
    return isEven($randomNumber) ? 'yes' : 'no';
}

function gameQuestion(int $randomNumber): string
{
    return "Question: {$randomNumber}";
}

function game(): void
{
    $userName = greet();
    $gameRules = gameRules();
    line($gameRules);
    for ($i = 0; $i < 3; $i++) {
        $roundData = gameData();
        $roundQuestion = gameQuestion($roundData);
        $roundCorrectAnswer = gameCorrectAnswer($roundData);
        $roundCompleted = gameEngine($userName, $roundQuestion, $roundCorrectAnswer);
        if (!$roundCompleted) {
            return;
        }
    }
    line("Congratulations, {$userName}!");
    return;
}
