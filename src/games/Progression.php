<?php

namespace BrainGames\games\Progression;

use function BrainGames\Main\run;

const TASK = "What number is missing in the progression?";
const PROGRESSION_LENGTH = 10;

function start()
{
    $generateGameData = function () {
        $step = rand(1, 10);
        $begin = rand(1, 10);
        $end = $begin + $step * (PROGRESSION_LENGTH - 1);

        $progression = range($begin, $end, $step);
        $hiddenElementPosition = array_rand($progression);

        $rightAnswer = (string) $progression[$hiddenElementPosition];
        $progression[$hiddenElementPosition] = '..';
        $question = implode(' ', $progression);

        return [$question, $rightAnswer];
    };

    run(TASK, $generateGameData);
}
