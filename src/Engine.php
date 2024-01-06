<?php

namespace BrainGames\Engine;

use function BrainGames\Cli\greet;
use function cli\line;
use function cli\prompt;

const GAME_ROUNDS = 3;

function gameEngine(string $gameRules, callable $generateRoundData): void
{
    // [$gameRules, $roundsData] = $gameData;
    $userName = greet();
    line($gameRules);
    for ($i = 0; $i < GAME_ROUNDS; $i += 1) {
        [$roundQuestion, $roundCorrectAnswer] = $generateRoundData();
        $userAnswer = prompt($roundQuestion);
        line("Your answer: {$userAnswer}");
        if ($userAnswer === $roundCorrectAnswer) {
            line('Correct!');
        } else {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$roundCorrectAnswer}'");
            line("Let's try again, {$userName}!");
            return;
        }
    }
    line("Congratulations, {$userName}!");
    return;
}
