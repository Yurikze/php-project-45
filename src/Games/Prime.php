<?php

namespace BrainGames\Games\Prime;

function primeGame(): array
{
    $randomNumber = rand(2, 20);
    $isPrime = true;
    for ($j = 2; $j <= $randomNumber; $j++) {
        if ($randomNumber % $j === 0 && $j !== $randomNumber) {
            $isPrime = false;
        }
    }
    $correctAnswer = $isPrime ? 'yes' : 'no';
    return [$correctAnswer, $randomNumber];
}

function gameRules(): string
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}