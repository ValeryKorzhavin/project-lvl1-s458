<?php

namespace BrainGames\games\Gcd;

use function BrainGames\Game\run;

const TASK = "Find the greatest common divisor of given numbers.";

function getGcd($a, $b): int
{
    return $a % $b === 0 ? $b : getGcd($b, $a % $b);
}

function start()
{
    run(TASK, function () {
        $firstNum = rand(0, 100);
        $secondNum = rand(0, 100);
        
        $question = "$firstNum $secondNum";
        $rightAnswer = (string) getGcd($firstNum, $secondNum);

        return [$question, $rightAnswer];
    });
}
