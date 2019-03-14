<?php

namespace DivineOmega\OmegaValidator\Rules;

use DivineOmega\OmegaValidator\Interfaces\Rule;

class IsString implements Rule
{
    public function passes(string $key, $value): bool
    {
        return is_string($value);
    }

    public function message(): string
    {
        return 'The :key must be a string.';
    }
}