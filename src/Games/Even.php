<?php

namespace BrainGames\Games\Even;

function evenGame(): array
{
    $randomNumber = rand(1, 100);
    $isEven = $randomNumber % 2 === 0;
    $correctAnswer = $isEven ? 'yes' : 'no';
    return [$correctAnswer, $randomNumber];
}

function gameRules(): string
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}
