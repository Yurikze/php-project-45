<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function gameEngine(string $userName, string $question, string | int $correctAnswer): bool
{
    $userAnswer = prompt($question);
    line("Your answer: {$userAnswer}");
    $userAnswer = gettype($correctAnswer) === 'integer' ? intval($userAnswer, 10) : $userAnswer;
    if ($userAnswer === $correctAnswer) {
        line('Correct!');
        return true;
    } else {
        line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'");
        line("Let's try again, {$userName}!");
        return false;
    }
}
