<?php

namespace DivineOmega\OmegaValidator\Rules;

use DivineOmega\OmegaValidator\Interfaces\Rule;

class IsOneOf implements Rule
{
    protected $valuesToCompare;
    protected $strict;

    public function __construct(array $valuesToCompare, $strict = true)
    {
        $this->valuesToCompare = $valuesToCompare;
        $this->strict = $strict;
    }

    public function passes(string $key, $value): bool
    {
        return in_array($value, $this->valuesToCompare, $this->strict);
    }

    public function message(): string
    {
        return 'The :key must be one of '.implode(', ', $this->valuesToCompare).'.';
    }
}