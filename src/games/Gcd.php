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
        $firstNum = rand(1, 100);
        $secondNum = rand(1, 100);
        
        $question = "$firstNum $secondNum";
        $rightAnswer = (string) getGcd($firstNum, $secondNum);

        return [$question, $rightAnswer];
    };

    run(TASK, $generator);
}
