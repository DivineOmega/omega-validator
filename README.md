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
    var_dump($validator->messages());
}
```