<?php

class NumbersUtility
{
    public function bubbleSort(array $integers)
    {
        $sorter = new Sorter($integers);
        return $sorter->bubbleSorting();
    }

    public function getMedian(array $integers)
    {
        $sortedNumbers = $this->bubbleSort($integers);
        $sortedCount = count($sortedNumbers);
        $sortedHalfCount = $sortedCount / 2;
        $median = 0;

        if ($sortedCount % 2 == 0) {
            $lowerMedianIndex = $sortedHalfCount - 1;
            $median = ($sortedNumbers[$lowerMedianIndex] + $sortedNumbers[$lowerMedianIndex + 1]) / 2;
        } else {
            $flooredCount = floor($sortedHalfCount);
            $median = $sortedNumbers[$flooredCount];
        }

        return $median;
    }

    public function getMax(array $integers)
    {
        return max($integers);
    }
}
