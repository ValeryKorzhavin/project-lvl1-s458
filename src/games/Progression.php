<?php

namespace BrainGames\games\Progression;

use function BrainGames\Main\run;

const TASK = "What number is missing in the progression?";
const PROGRESSION_LENGTH = 10;

function start()
{
    run(TASK, function () {
        $step = rand(1, 10);
        $beg = rand(1, 10);
        $end = $beg + $step * (PROGRESSION_LENGTH - 1);

        $progression = range($beg, $end, $step);
        $hiddenElementPosition = array_rand($progression);

        $rightAnswer = (string) $progression[$hiddenElementPosition];
        $progression[$key] = '..';
        $question = implode(' ', $progression);

        return [$question, $rightAnswer];
    });
}
