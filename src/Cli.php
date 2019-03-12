<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function run(string $gameRules = '')
{
    line('Welcome to the Brain Games!');
    !$gameRules ?: line($gameRules);
    line();
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    !$gameRules ?: line();
    return $name;
}

function ask(string $question)
{
    line('Question: %s', $question);
    $answer = prompt('Your answer');
    return $answer;
}

function correct()
{
    line('Correct!');
}

function result(string $name, string $right = '', string $wrong = '')
{
    if ($right && $wrong) {
        line('"%s" is wrong answer ;(. Correct answer was "%s"', $wrong, $right);
        line('Let\'s try again, %s!', $name);
    } else {
        line('Congratulations, %s!', $name);
    }
}
