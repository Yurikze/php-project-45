<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Cli\greet;
use function BrainGames\Engine\gameEngine;
use function cli\line;

function gameRules(): string
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}

function gameData(): int
{
    return rand(2, 20);
}

function isPrime(int $number): bool
{
    $isPrime = true;
    for ($j = 2; $j <= $number; $j++) {
        if ($number % $j === 0 && $j !== $number) {
            $isPrime = false;
        }
    }
    return $isPrime;
}

function gameCorrectAnswer($userAnswer): string
{
    return isPrime($userAnswer) ? 'yes' : 'no';
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
