<?php

namespace BrainGames\games\Calc;

use function BrainGames\Main\run;

const TASK = "What is the result of the expression?";

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
        $operationsCount = 3;
        $operation = $operations[rand(0, ($operationsCount - 1))];
        $question = "$a {$operation['sign']} $b";
        $rightAnswer = (string) $operation['operation']($a, $b);

        return [$question, $rightAnswer];
    };

    run(TASK, $generateGameData);
}
