<?php

namespace DivineOmega\OmegaValidator\Rules;

use DivineOmega\OmegaValidator\Interfaces\Rule;
use PDO;

class ExistsInDatabase implements Rule
{
    private $pdo;
    private $table;
    private $field;

    public function __construct(PDO $pdo, $table, $field)
    {
        $this->pdo = $pdo;
        $this->table = $table;
        $this->field = $field;
    }

    public function passes(string $key, $value): bool
    {
        $sql = 'select count('.$this->field.') as c from '.$this->table.' where '.$this->field.' = :value';

        $statement = $this->pdo->prepare($sql);

        $statement->execute([
            'value' => $value,
        ]);

        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $count = (int) $row['c'];

        return ($count > 0);

    }

    public function message(): string
    {
        return 'The :key must already exist.';
    }
}