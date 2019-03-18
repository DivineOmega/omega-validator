<?php

namespace DivineOmega\OmegaValidator;

class Translator extends BaseTranslator
{
    public function getDefaultLanguageDirectory()
    {
        return __DIR__.'/../resources/lang/';
    }
}