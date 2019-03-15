<?php

namespace DivineOmega\OmegaValidator\Rules;

use DivineOmega\OmegaValidator\Interfaces\Rule;

class IsTruthy implements Rule
{
    public function passes(string $key, $value): bool
    {
        return $value == true;
    }

    public function message(): string
    {
        return 'The :key must be truthy.';
    }
}