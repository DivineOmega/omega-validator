<?php

namespace DivineOmega\OmegaValidator\Rules;

use DivineOmega\OmegaValidator\Interfaces\Rule;
use PDO;

class DoesNotExistInDatabase extends ExistsInDatabase implements Rule
{
    public function passes(string $key, $value): bool
    {
        return !parent::passes($key, $value);
    }

    public function message(): string
    {
        return 'The :key must not already exist.';
    }
}