<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function gameEngine()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    $rounds = 3;
    return [$name, $rounds];
}