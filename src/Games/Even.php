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

function gameCorrectAnswer(int $randomNumber): string
{
    return $randomNumber % 2 === 0 ? 'yes' : 'no';
}

function gameQuestion(int $randomNumber): string
{
    return "Question: {$randomNumber}";
}

// function evenGame(): array
// {
//     $randomNumber = rand(1, 100);
//     $isEven = $randomNumber % 2 === 0;
//     $correctAnswer = $isEven ? 'yes' : 'no';
//     return [$correctAnswer, $randomNumber];
// }