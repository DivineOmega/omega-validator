<?php

namespace DivineOmega\OmegaValidator;

use DivineOmega\OmegaValidator\Exceptions\UnableToLoadTranslationDataException;

class Translator
{
    private $language;
    private $data = [];

    /**
     * Translator constructor.
     * @param string $language
     * @throws UnableToLoadTranslationDataException
     */
    public function __construct(string $language = null)
    {
        $this->language = $language;

        if ($language) {
            $this->loadTranslationData();
        }
    }

    /**
     * @throws UnableToLoadTranslationDataException
     */
    private function loadTranslationData()
    {
        $file = __DIR__.'/../resources/lang/'.basename($this->language).'.json';

        $this->data = json_decode(file_get_contents($file), true);

        if ($this->data === null) {
            throw new UnableToLoadTranslationDataException($file);
        }
    }

    /**
     * @param $string
     * @return mixed
     */
    public function translate($string)
    {
        if (array_key_exists($string, $this->data)) {
            return $this->data[$string];
        }

        return $string;
    }
}