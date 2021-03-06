<?php

namespace DivineOmega\OmegaValidator\Rules;

use DivineOmega\OmegaValidator\Interfaces\Rule;

class NotOneOf extends IsOneOf implements Rule
{
    public function passes(string $key, $value): bool
    {
        return !parent::passes($key, $value);
    }

    public function message(): string
    {
        return 'The :key must not be one of '.implode(', ', $this->valuesToCompare).'.';
    }
}