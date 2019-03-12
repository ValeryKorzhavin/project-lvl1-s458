<?php

namespace BrainGames\Even;

use function BrainGames\Cli\run;
use function BrainGames\Cli\ask;
use function BrainGames\Cli\correct;
use function BrainGames\Cli\result;

const RAND_MIN = 0;
const RAND_MAX = 100;
const ATTEMPTS_COUNT = 3;
const CONDITION = "Answer 'yes' if a number is even otherwise answer 'no'";

function getRandomInt()
{
    return rand(RAND_MIN, RAND_MAX);
}

function isEven(int $num): bool
{
    return $num % 2 === 0;
}

function start()
{
    $name = run(CONDITION);
    $attempts = 0;

    while ($attempts < ATTEMPTS_COUNT) {
        $num = getRandomInt();
        $answer = ask((string) $num);

        if (!checkAnswer($num, $answer)) {
            result($name, getRight($num), $answer);
            return;
        }
        correct();
        $attempts++;
    }
    result($name);
}

function getRight(int $number): string
{
    return isEven($number) ? 'yes' : 'no';
}

function checkAnswer(int $number, string $answer): bool
{
    return $answer === getRight($number);
}
