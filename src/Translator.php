<?php

namespace DivineOmega\OmegaValidator;

use DivineOmega\OmegaValidator\Exceptions\TranslationDataFileNotFoundException;
use DivineOmega\OmegaValidator\Exceptions\UnableToLoadTranslationDataException;

class Translator
{
    private $data = [];

    /**
     * Translator constructor.
     * @param string $language
     * @throws TranslationDataFileNotFoundException
     * @throws UnableToLoadTranslationDataException
     */
    public function __construct(string $language = null)
    {
        if (!$language) {
            return;
        }

        $file = __DIR__.'/../resources/lang/'.basename($language).'.json';

        if (file_exists($file)) {
            $this->loadTranslationData($file);
        }
    }

    /**
     * @throws UnableToLoadTranslationDataException
     * @throws TranslationDataFileNotFoundException
     */
    public function loadTranslationData(string $file)
    {
        if (!file_exists($file)) {
            throw new TranslationDataFileNotFoundException($file);
        }

        $data = json_decode(file_get_contents($file), true);

        if ($data === null) {
            throw new UnableToLoadTranslationDataException($file);
        }

        $this->data = array_merge($this->data, $data);
    }

    /**
     * @param $string
     * @return mixed
     */
    public function translate($string)
    {
        if (array_key_exists($string, $this->data)) {
            $translated = $this->data[$string];
            return $translated ? $translated : $string;
        }

        return $string;
    }
}