<?php

namespace BrainGames\Games\Even;

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
