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

    // array(1) {
    //  ["email"]=>
    //  array(2) {
    //    ["DivineOmega\OmegaValidator\Rules\Required"]=>
    //    string(22) "The email is required."
    //    ["DivineOmega\OmegaValidator\Rules\IsEmail"]=>
    //    string(40) "The email must be a valid email address."
    //  }
    // }


    // German messages
    var_dump($validator->messages(new Translator('de')));

    // Polish messages
    var_dump($validator->messages(new Translator('pl')));

    // etc...
}