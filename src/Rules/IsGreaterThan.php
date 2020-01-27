<?php

namespace DivineOmega\OmegaValidator\Rules;

use DivineOmega\OmegaValidator\Interfaces\Rule;

class IsGreaterThan implements Rule
{
    private $comparisonValue;

    public function __construct($comparisonValue)
    {
        $this->comparisonValue = $comparisonValue;
    }

    public function passes(string $key, $value): bool
    {
        return $value > $this->comparisonValue;
    }

    public function message(): string
    {
        return 'The :key must be greater than '.$this->comparisonValue.'.';
    }
}