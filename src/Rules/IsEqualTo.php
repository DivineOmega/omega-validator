<?php

namespace DivineOmega\OmegaValidator\Rules;

use DivineOmega\OmegaValidator\Interfaces\Rule;

class IsEqualTo implements Rule
{
    private $valueToCompare;
    private $strict;

    public function __construct($valueToCompare, $strict = true)
    {
        $this->valueToCompare = $valueToCompare;
        $this->strict = $strict;
    }

    public function passes(string $key, $value): bool
    {
        if ($this->strict) {
            return $value === $this->valueToCompare;
        }

        return $value == $this->valueToCompare;
    }

    public function message(): string
    {
        return 'The :key must be equal to '.$this->valueToCompare.'.';
    }
}