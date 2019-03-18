<?php

namespace DivineOmega\OmegaValidator;

use DivineOmega\Translator\Translator as BaseTranslator;

class Translator extends BaseTranslator
{
    public function getDefaultLanguageDirectory()
    {
        return __DIR__.'/../resources/lang/';
    }
}