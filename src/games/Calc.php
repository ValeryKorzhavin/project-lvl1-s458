<?php

namespace BrainGames\Calc;

use function BrainGames\Cli\run;

const RAND_MIN = 0;
const RAND_MAX = 100;
const CONDITION = "What is the result of the expression?";
const OPERATION = ['*', '+', '-'];

function getRandomInt()
{
    return rand(RAND_MIN, RAND_MAX);
}

function getRandomOp()
{
    return OPERATION[array_rand(OPERATION)];
}

function getQuestion()
{
    $firstOperand = getRandomInt();
    $secondOperand = getRandomInt();
    $operation = getRandomOp();

    return "$firstOperand $operation $secondOperand";
}

function getAnswer(string $expression): int
{
    return eval("return $expression;");
}

function start()
{
    run(CONDITION, function () {
        $question = getQuestion();
        $answer = getAnswer($question);

        return [(string) $question, $answer];
    });
}
