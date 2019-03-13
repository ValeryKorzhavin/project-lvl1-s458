<?php

namespace BrainGames\games\Progression;

use function BrainGames\Main\run;

const TASK = "What number is missing in the progression?";

function getProgression(): array
{
    $step = rand(1, 10);
    $beg = rand(1, 10);
    $length = 9;
   
    $progression = range($beg, $beg + $step * $length, $step);
    $key = array_rand($progression);

    $rightAnswer = (string) $progression[$key];
    $progression[$key] = '..';
    $question = implode(' ', $progression);
    
    return [$question, $rightAnswer];
}

function start()
{
    run(TASK, function () {
        return getProgression();
    });
}
