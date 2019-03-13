<?php

namespace BrainGames\Main;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function run(string $task = '', callable $generator = null): void
{
    line('Welcome to the Brain Games!');
    !$task ?: line($task);
    line();
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    
    if (!$task || !$generator) {
        return;
    }
    line();

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        [$question, $rightAnswer] = $generator();

        line('Question: %s', $question);
        $answer = prompt('Your answer');

        if ($answer !== $rightAnswer) {
            line('"%s" is wrong answer ;(. Correct answer was "%s"', $answer, $rightAnswer);
            line('Let\'s try again, %s!', $name);
            return;
        }
        line('Correct!');
    }
    line('Congratulations, %s!', $name);
}
