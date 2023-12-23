<?php

namespace BrainGames\Games\Prime;

function gameRules(): string
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}

function gameData(): int
{
    return rand(2, 20);
}

function gameCorrectAnswer(int $randomNumber): string
{
    $isPrime = true;
    for ($j = 2; $j <= $randomNumber; $j++) {
        if ($randomNumber % $j === 0 && $j !== $randomNumber) {
            $isPrime = false;
        }
    }
    $correctAnswer = $isPrime ? 'yes' : 'no';
    return $correctAnswer;
}

function gameQuestion(int $randomNumber): string
{
    return "Question: {$randomNumber}";
}
