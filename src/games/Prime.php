<?php

namespace BrainGames\games\Prime;

use function BrainGames\Main\run;

const TASK = "Answer 'yes' if given number is prime. Otherwise answer 'no'.";

function isPrime(int $number): bool
{
    if ($number < 2) {
        return false;
    }
    for ($i = 2; $i <= $number / 2; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}

function start()
{
    $generateGameData = function () {
        $number = rand(0, 100);
        $rightAnswer = isPrime($number) ? 'yes' : 'no';
        $question = (string) $number;

        return [$question, $rightAnswer];
    };

    run(TASK, $generateGameData);
}
