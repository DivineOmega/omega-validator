<?php

use DivineOmega\OmegaValidator\Rules\IsEmail;
use DivineOmega\OmegaValidator\Rules\IsString;
use DivineOmega\OmegaValidator\Rules\Required;
use DivineOmega\OmegaValidator\Translator;
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
]);

if ($validator->fails()) {

    // English messages
    var_dump($validator->messages());

    // German messages
    var_dump($validator->messages(new Translator('de')));

    // Polish messages
    var_dump($validator->messages(new Translator('pl')));

    // etc...
}