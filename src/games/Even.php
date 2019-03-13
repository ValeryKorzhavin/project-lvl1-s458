<?php

namespace BrainGames\games\Even;

use function BrainGames\Main\run;

const TASK = "Answer 'yes' if a number is even otherwise answer 'no'.";

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function start()
{
    $generator = function () {
        $number = rand(0, 100);
        $rightAnswer = isEven($number) ? 'yes' : 'no';
        $question = (string) $number;

        return [$question, $rightAnswer];
    };

    run(TASK, $generator);
}
