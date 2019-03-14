<?php

namespace BrainGames\games\Calc;

use function BrainGames\Main\run;

const TASK = "What is the result of the expression?";
const OPERATIONS_COUNT = 3;

function start()
{
    $operations = [
        [
            'sign' => '*', 'operation' => function ($a, $b) {
                return $a * $b;
            }
        ],
        [
            'sign' => '+', 'operation' => function ($a, $b) {
                return $a + $b;
            }
        ],
        [
            'sign' => '-', 'operation' => function ($a, $b) {
                return $a - $b;
            }
        ]
    ];

    $generateGameData = function () use ($operations) {
        $a = rand(0, 100);
        $b = rand(0, 100);
        $operation = $operations[rand(0, (OPERATIONS_COUNT - 1))];
        $question = "$a {$operation['sign']} $b";
        $rightAnswer = (string) $operation['operation']($a, $b);

        return [$question, $rightAnswer];
    };

    run(TASK, $generateGameData);
}
