<?php

namespace BrainGames\games\Calc;

use function BrainGames\Main\run;

const TASK = "What is the result of the expression?";

function start()
{
    run(TASK, function () {
        $a = rand(0, 100);
        $b = rand(0, 100);
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
        $operation = $operations[rand(0, 2)];

        $question = "$a {$operation['sign']} $b";
        $rightAnswer = (string) $operation['operation']($a, $b);

        return [$question, $rightAnswer];
    });
}
