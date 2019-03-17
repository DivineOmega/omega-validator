# Omega Validator

## Installation

To install Omega Validator, just run the following Composer command.

```bash
composer require divineomega/omega-validator
```

## Usage

See the following example usage.

```php
use DivineOmega\OmegaValidator\Rules\IsEmail;
use DivineOmega\OmegaValidator\Rules\IsString;
use DivineOmega\OmegaValidator\Rules\Required;
use DivineOmega\OmegaValidator\Translator;
use DivineOmega\OmegaValidator\Validator;

/* ... */

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
```