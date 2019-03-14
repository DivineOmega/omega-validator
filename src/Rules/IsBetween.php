<?php

namespace DivineOmega\OmegaValidator\Rules;

use DivineOmega\OmegaValidator\Interfaces\Rule;

class IsBetween implements Rule
{
    private $min;
    private $max;
    private $inclusive;

    public function __construct($min, $max, $inclusive = true)
    {
        $this->min = $min;
        $this->max = $max;
        $this->inclusive = $inclusive;
    }

    public function passes(string $key, $value): bool
    {
        if ($this->inclusive) {
            return $value >= $this->min && $value <= $this->max;
        }

        return $value > $this->min && $value < $this->max;
    }

    public function message(): string
    {
        $inclusiveExclusiveString = $this->inclusive ? 'inclusive' : 'exclusive';
        return 'The :key must be between '.$this->min.' and '.$this->max.' '.$inclusiveExclusiveString.'.';
    }
}