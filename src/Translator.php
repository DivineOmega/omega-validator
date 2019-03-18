<?php

namespace DivineOmega\OmegaValidator;

use DivineOmega\OmegaValidator\Exceptions\TranslationDataFileNotFoundException;
use DivineOmega\OmegaValidator\Exceptions\UnableToLoadTranslationDataException;

class Translator extends AbstractTranslator
{
    public function getDefaultLanguageDirectory()
    {
        return __DIR__.'/../resources/lang/';
    }
}