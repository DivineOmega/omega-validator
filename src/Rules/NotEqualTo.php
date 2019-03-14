<?php

namespace DivineOmega\OmegaValidator\Rules;

use DivineOmega\OmegaValidator\Interfaces\Rule;

class NotEqualTo extends IsEqualTo implements Rule
{
    public function passes(string $key, $value): bool
    {
        return !parent::passes($key, $value);
    }

    public function message(): string
    {
        return 'The :key must not be equal to '.$this->valueToCompare.'.';
    }
}