<?php

namespace BrainGames\games\Even;

use function BrainGames\Main\run;

const TASK = "Answer 'yes' if number prime otherwise answer 'no'";

function isPrime(int $num): bool
{
    if ($num < 2) {
        return false;
    }
    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}

function start()
{
    run(TASK, function () {
        $number = rand(0, 100);
        $rightAnswer = isPrime($number) ? 'yes' : 'no';
        $question = (string) $number;

        return [$question, $rightAnswer];
    });
}
