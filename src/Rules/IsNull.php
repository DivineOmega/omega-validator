<?php

namespace DivineOmega\OmegaValidator\Rules;

use DivineOmega\OmegaValidator\Interfaces\Rule;

class IsNull implements Rule
{
    public function passes(string $key, $value): bool
    {
        return $value === null;
    }

    public function message(): string
    {
        return 'The :key must be null.';
    }
}