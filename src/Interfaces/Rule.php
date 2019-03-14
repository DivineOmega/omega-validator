<?php

namespace DivineOmega\OmegaValidator\Interfaces;

interface Rule
{
    public function passes(string $key, $value) : bool;
    public function message() : string;
}