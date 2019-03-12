<?php

namespace BrainGames\Even;

use function BrainGames\Cli\run;

const RAND_MIN = 0;
const RAND_MAX = 100;
const CONDITION = "Answer 'yes' if a number is even otherwise answer 'no'";

function getRandomInt()
{
    return rand(RAND_MIN, RAND_MAX);
}

function isEven(int $num): bool
{
    return $num % 2 === 0;
}

function getAnswer(int $number): string
{
    return isEven($number) ? 'yes' : 'no';
}

function start()
{
    run(CONDITION, function () {
        $question = getRandomInt();
        $answer = getAnswer($question);
    
        return [(string) $question, $answer];
    });
}
