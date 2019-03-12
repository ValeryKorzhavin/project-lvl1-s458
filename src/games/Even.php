<?php

namespace BrainGames\Even;

use function BrainGames\Cli\run;

const TASK = "Answer 'yes' if a number is even otherwise answer 'no'";

function isEven(int $num): bool
{
    return $num % 2 === 0;
}

function start()
{
    run(TASK, function () {
        $number = rand(0, 100);
        $answer = isEven($number) ? 'yes' : 'no';
        $question = (string) $number;

        return [$question, $answer];
    });
}
