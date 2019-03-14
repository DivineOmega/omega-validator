<?php

interface Rule
{
    public function passes() : bool;
    public function message() : string;
}