<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

const ATTEMPTS_COUNT = 3;

function run(string $gameRules = '', callable $generator = null): void
{
    line('Welcome to the Brain Games!');
    !$gameRules ?: line($gameRules);
    line();
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    
    if (!$gameRules || !$generator) {
        return;
    }
    line();

    for ($i = 0; $i < ATTEMPTS_COUNT; $i++) {
        [$question, $rightAnswer] = $generator();

        line('Question: %s', $question);
        $answer = prompt('Your answer');

        if (!checkAnswer($answer, $rightAnswer)) {
            line('"%s" is wrong answer ;(. Correct answer was "%s"', $answer, $rightAnswer);
            line('Let\'s try again, %s!', $name);
            return;
        }
        line('Correct!');
    }
    line('Congratulations, %s!', $name);
}

function checkAnswer(string $answer, string $rightAnswer)
{
    return $answer === $rightAnswer;
}
