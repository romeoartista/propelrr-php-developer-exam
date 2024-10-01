<?php

if (count($argv) <= 1) {
    die("Please enter an integer between 1 and 20");
}

$num = end($argv);

if (!is_numeric($num)) {
    die("Please enter an integer value");
}

$num = (int)$num;

if (is_float($num) && !is_int($num)) {
    die("Please enter an integer value");
}

if ($num < 1) {
    die("Please enter an integer between 1 and 20");
}

function fibonacciSequence($input)
{
    $num1 = 0;
    $num2 = 1;
    $num3 = 0;
    $fibonacci = '';
    
    for ($i = 0; $i <= $input; $i++) {
        $num3 = $num1 + $num2;
        $fibonacci = $fibonacci . $num3 . ' ';
        $num1 = $num2;
        $num2 = $num3;
    }

    return $fibonacci;
}

echo fibonacciSequence($num);
