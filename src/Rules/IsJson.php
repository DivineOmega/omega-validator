<?php

namespace DivineOmega\OmegaValidator\Rules;

use DivineOmega\OmegaValidator\Interfaces\Rule;

class IsJson implements Rule
{
    public function passes(string $key, $value): bool
    {
        return json_decode($value, true) !== null;
    }

    public function message(): string
    {
        return 'The :key must be valid JSON.';
    }
}