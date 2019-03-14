<?php

namespace DivineOmega\OmegaValidator\Rules;

use DivineOmega\OmegaValidator\Interfaces\Rule;

class IsInteger implements Rule
{
    public function passes(string $key, $value): bool
    {
        return is_integer($value);
    }

    public function message(): string
    {
        return 'The :key must be an integer.';
    }
}