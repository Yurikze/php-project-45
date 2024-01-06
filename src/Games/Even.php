<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\gameEngine;

use const BrainGames\Engine\GAME_ROUNDS;

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
