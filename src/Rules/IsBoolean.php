<?php

namespace DivineOmega\OmegaValidator\Rules;

use DivineOmega\OmegaValidator\Interfaces\Rule;

class IsBoolean implements Rule
{
    public function passes(string $key, $value): bool
    {
        return is_bool($value);
    }

    public function message(): string
    {
        return 'The :key must be a boolean.';
    }
}