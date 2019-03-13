<?php

namespace BrainGames\games\Even;

use function BrainGames\Main\run;

const TASK = "Balance the given number";

function isEven(int $num): bool
{
    return $num % 2 === 0;
}

function start()
{
    run(TASK, function () {
        $number = rand(0, 100);
        $rightAnswer = isEven($number) ? 'yes' : 'no';
        $question = (string) $number;

        return [$question, $rightAnswer];
    });
}
