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

function gameCorrectAnswer(int $userAnswer): string
{
    return isPrime($userAnswer) ? 'yes' : 'no';
}

function gameQuestion(int $randomNumber): string
{
    return "Question: {$randomNumber}";
}
