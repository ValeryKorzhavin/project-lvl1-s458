<?php

namespace BrainGames\games\Progression;

use function BrainGames\Main\run;

const TASK = "What number is missing in the progression?";
const PROGRESSION_LENGTH = 10;

function start()
{
    $generateGameData = function () {
        $progressionStep = rand(1, 10);
        $firstElement = rand(1, 10);
        $lastElement = $firstElement + $progressionStep * (PROGRESSION_LENGTH - 1);

        $progression = range($firstElement, $lastElement, $progressionStep);
        $hiddenElementPosition = array_rand($progression);

        $rightAnswer = (string) $progression[$hiddenElementPosition];
        $progression[$hiddenElementPosition] = '..';
        $question = implode(' ', $progression);

        return [$question, $rightAnswer];
    };

    run(TASK, $generateGameData);
}
