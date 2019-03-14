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

        $this->validateRuleSets();
    }

    private function validateRuleSets()
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

            /** @var Rule $rule */
            foreach ($rules as $rule) {
                if (!$rule->passes($key, $value)) {
                    return false;
                }
            }
        }

        return true;
    }

    public function fails()
    {
        return !$this->passes();
    }

    public function messages()
    {
        $messages = [];

        foreach($this->ruleSets as $key => $rules) {
            $value = array_key_exists($key, $this->data) ? $this->data[$key] : null;

            /** @var Rule $rule */
            foreach ($rules as $rule) {
                if ($rule->passes($key, $value)) {
                    continue;
                }

                if (!array_key_exists($key, $messages)) {
                    $messages[$key] = [];
                }

                $messages[$key][get_class($rule)] = $this->message($rule, $key, $value);
            }
        }

        return $messages;
    }

    private function message(Rule $rule, string $key, $value)
    {
        return str_replace([':key', ':value'], [$key, $value], $rule->message());
    }

}