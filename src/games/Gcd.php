<?php

namespace BrainGames\Gcd;

use function BrainGames\Cli\run;

const CONDITION = "Find the greatest common divisor of given numbers.";
const RAND_MIN = 0;
const RAND_MAX = 100;
const STEP_MIN = 1;
const STEP_MAX = 10;

function getNumbers()
{
    $arrayStep = rand(STEP_MIN, STEP_MAX);
    print_r("Step: $arrayStep");
    $randArray = range(RAND_MIN, RAND_MAX, $arrayStep);

    [$firstKey, $secondKey] = array_rand($randArray, 2);

    $firstNum = $randArray[$firstKey];
    $secondNum = $randArray[$secondKey];

    return [$firstNum, $secondNum];
}

function gcd($a, $b): int
{
    return $a % $b === 0 ? $b : gcd($b, $a % $b);
}

function getAnswer(int $firstNum, int $secondNum): int
{
    return gcd($firstNum, $secondNum);
}

function start()
{
    run(CONDITION, function () {
        [$firstNum, $secondNum] = getNumbers();
        $question = "$firstNum $secondNum";
        $answer = getAnswer($firstNum, $secondNum);

        return [$question, $answer];
    });
}
