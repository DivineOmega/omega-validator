<?php

namespace DivineOmega\OmegaValidator\Rules;

use DivineOmega\OmegaValidator\Interfaces\Rule;

class IsArray implements Rule
{
    public function passes(string $key, $value): bool
    {
        return is_array($value);
    }

    public function message(): string
    {
        return 'The :key must be an array.';
    }
}