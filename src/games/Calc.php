<?php

namespace BrainGames\Calc;

use function BrainGames\Cli\run;

const TASK = "What is the result of the expression?";
const OPERATION = ['*', '+', '-'];

function getQuestion()
{
    $firstOperand = rand(0, 100);
    $secondOperand = rand(0, 100);
    $operation = OPERATION[array_rand(OPERATION)];

    return "$firstOperand $operation $secondOperand";
}

function start()
{
    run(TASK, function () {
        $question = getQuestion();
        $answer = (string) eval("return $question;");

        return [$question, $answer];
    });
}
