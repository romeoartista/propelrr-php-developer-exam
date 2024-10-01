<?php

require_once('Sorter.php');
require_once('NumbersUtility.php');

$unsorted = range(1, 20);
shuffle($unsorted);
$unsortedCount = count($unsorted);

$numbersUtility = new NumbersUtility();
$sorted = $numbersUtility->bubbleSort($unsorted);
$sortedCount = count($sorted);

echo 'Unsorted: ';

for ($i = 0; $i < $unsortedCount; $i++) {
    echo $unsorted[$i] . ' ';
}

echo PHP_EOL . 'Sorted: ';

for ($i = 0; $i < $sortedCount; $i++) {
    echo $sorted[$i] . ' ';
}

echo PHP_EOL . 'Median: ' . $numbersUtility->getMedian($sorted);

echo PHP_EOL . 'Max: ' . $numbersUtility->getMax($sorted);
