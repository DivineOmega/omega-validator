<?php

use DivineOmega\OmegaValidator\Rules\IsEmail;
use DivineOmega\OmegaValidator\Rules\IsString;
use DivineOmega\OmegaValidator\Rules\Required;
use DivineOmega\OmegaValidator\Validator;

require_once __DIR__.'/vendor/autoload.php';

$validator = new Validator([
    'email' => '',
], [
    'email' => [
        new Required(),
        new IsEmail(),
        new IsString(),
    ],
], 'de');

if ($validator->fails()) {
    var_dump($validator->messages());
}