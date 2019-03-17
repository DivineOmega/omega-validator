<?php

use DivineOmega\OmegaValidator\Rules\IsEmail;
use DivineOmega\OmegaValidator\Rules\IsString;
use DivineOmega\OmegaValidator\Rules\Required;
use DivineOmega\OmegaValidator\Translator;
use DivineOmega\OmegaValidator\Validator;

require_once __DIR__.'/vendor/autoload.php';

$data = [
    'email' => '',
];

$rules = [
    'email' => [
        new Required(),
        new IsEmail(),
        new IsString(),
    ]
];

$validator = new Validator($data, $rules);

if ($validator->fails()) {

    // English messages
    var_dump($validator->messages());

    // German messages
    var_dump($validator->messages(new Translator('de')));

    // Polish messages
    var_dump($validator->messages(new Translator('pl')));

    // etc...
}