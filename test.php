<?php

use DivineOmega\OmegaValidator\Rules\Required;
use DivineOmega\OmegaValidator\Validator;

require_once __DIR__.'/vendor/autoload.php';

$validator = new Validator([
    'email' => '',
], [
    'email' => [new Required()],
]);

if (!$validator->passes()) {
    var_dump($validator->messages());
}