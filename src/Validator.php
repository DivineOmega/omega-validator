<?php

namespace DivineOmega\OmegaValidator;


use DivineOmega\OmegaValidator\Exceptions\InvalidRuleException;
use DivineOmega\OmegaValidator\Interfaces\Rule;

class Validator
{
    private $data;
    private $ruleSets;

    public function __construct(array $data, array $ruleSets)
    {
        $this->data = $data;
        $this->ruleSets = $ruleSets;

        $this->validateRules();
    }

    private function validateRules()
    {
        foreach($this->ruleSets as $rules) {
            foreach ($rules as $rule) {
                if (!is_object($rule) || !$rule instanceof Rule) {
                    throw new InvalidRuleException();
                }
            }
        }
    }

    public function passes()
    {
        foreach($this->ruleSets as $key => $rules) {
            $value = array_key_exists($key, $this->data) ? $this->data[$key] : null;
            foreach ($rules as $rule) {
                if (!$rule->passes($key, $value)) {
                    return false;
                }
            }
        }

        return true;
    }

    public function messages()
    {
        $messages = [];

        foreach($this->ruleSets as $key => $rules) {
            $value = array_key_exists($key, $this->data) ? $this->data[$key] : null;
            foreach ($rules as $rule) {
                if (!$rule->passes($key, $value)) {
                    if (!array_key_exists($key, $messages)) {
                        $messages[$key] = [];
                    }
                    $messages[$key][get_class($rule)] = $this->formatMessage($rule->message(), $key, $value);
                }
            }
        }

        return $messages;
    }

    private function formatMessage($message, $key, $value)
    {
        return str_replace([':key', ':value'], [$key, $value], $message);
    }

}