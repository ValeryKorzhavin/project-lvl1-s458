<?php

namespace BrainGames\games\Gcd;

use function BrainGames\Main\run;

const TASK = "Find the greatest common divisor of given numbers.";

function getGcd($a, $b): int
{
    return $a % $b === 0 ? $b : getGcd($b, $a % $b);
}

function start()
{
    $generator = function () {
        $firstNumber = rand(1, 100);
        $secondNumber = rand(1, 100);
        
        $question = "$firstNumber $secondNumber";
        $rightAnswer = (string) getGcd($firstNumber, $secondNumber);

        return [$question, $rightAnswer];
    };

    run(TASK, $generator);
}
