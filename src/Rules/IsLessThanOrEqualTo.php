<?php

namespace DivineOmega\OmegaValidator\Rules;

use DivineOmega\OmegaValidator\Interfaces\Rule;

class IsLessThanOrEqualTo implements Rule
{
    private $comparisonValue;

    public function __construct($comparisonValue)
    {
        $this->comparisonValue = $comparisonValue;
    }

    public function passes(string $key, $value): bool
    {
        return $value <= $this->comparisonValue;
    }

    public function message(): string
    {
        return 'The :key must be less than or equal to '.$this->comparisonValue.'.';
    }
}