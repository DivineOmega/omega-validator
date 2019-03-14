<?php

namespace DivineOmega\OmegaValidator\Rules;

use DivineOmega\OmegaValidator\Interfaces\Rule;

class Required implements Rule
{
    public function passes(string $key, $value): bool
    {
        return !empty($value);
    }

    public function message(): string
    {
        return 'The :key is required.';
    }
}