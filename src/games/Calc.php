<?php

namespace BrainGames\games\Calc;

use function BrainGames\Main\run;

const TASK = "What is the result of the expression?";

function getOperation()
{
    return [
        [
            'op' => '*', 'func' => function ($a, $b) {
                return $a * $b;
            }
        ],
        [
            'op' => '+', 'func' => function ($a, $b) {
                return $a + $b;
            }
        ],
        [
            'op' => '-', 'func' => function ($a, $b) {
                return $a - $b;
            }
        ]
    ];
}

function start()
{
    run(TASK, function () {
        $a = rand(0, 100);
        $b = rand(0, 100);
        $operation = getOperation()[rand(0, 2)];

        $question = "$a {$operation['op']} $b";
        $rightAnswer = (string) $operation['func']($a, $b);

        return [$question, $rightAnswer];
    });
}
