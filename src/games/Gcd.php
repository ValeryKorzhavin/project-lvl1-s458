<?php

namespace BrainGames\games\Gcd;

use function BrainGames\Cli\run;

const TASK = "Find the greatest common divisor of given numbers.";

function getNumbers()
{
    $arrayStep = rand(1, 10);
    $randMin = $arrayStep;

    $randArray = range($randMin, 100, $arrayStep);
    [$firstKey, $secondKey] = array_rand($randArray, 2);

    $firstNum = $randArray[$firstKey];
    $secondNum = $randArray[$secondKey];

    return [$firstNum, $secondNum];
}

function gcd($a, $b): int
{
    return $a % $b === 0 ? $b : gcd($b, $a % $b);
}

function start()
{
    run(TASK, function () {
        [$firstNum, $secondNum] = getNumbers();
        $question = "$firstNum $secondNum";
        $answer = (string) gcd($firstNum, $secondNum);

        return [$question, $answer];
    });
}
