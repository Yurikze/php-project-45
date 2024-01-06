<?php

namespace BrainGames\Engine;

use function BrainGames\Cli\greet;
use function BrainGames\Config\setGameConfig;
use function cli\line;
use function cli\prompt;

function gameEngine(string $namespace): void
{
    setGameConfig();
    $createGameRules = $namespace . '\gameRules';
    $createGameData = $namespace . '\gameData';
    $createGameQuestion = $namespace . '\gameQuestion';
    $createGameCorrectAnswer = $namespace . '\gameCorrectAnswer';
    $userName = greet();
    $gameRules = $createGameRules();
    line($gameRules);
    for ($i = 0; $i < $GLOBALS['rounds']; $i++) {
        $roundData = $createGameData();
        $roundQuestion = $createGameQuestion($roundData);
        $roundCorrectAnswer = $createGameCorrectAnswer($roundData);
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
