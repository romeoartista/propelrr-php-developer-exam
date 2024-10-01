<?php

class Sorter
{
    protected $numbers = [];

    public function __construct(array $integers)
    {
        $this->numbers = $integers;
    }

    public function bubbleSorting()
    {
        $numberCount = count($this->numbers);
        $current = 0;

        for ($i = $numberCount - 1; $i > 0; $i--) {
            for ($j = 0; $j < $i; $j++) {
                if ($this->numbers[$j] > $this->numbers[$j + 1]) {
                    $current = $this->numbers[$j];
                    $this->numbers[$j] = $this->numbers[$j + 1];
                    $this->numbers[$j + 1] = $current;
                }
            }
        }

        return $this->numbers;
    }
}
