<?php

Validator::extend('trim', function($attribute, $value, $parameters)
{
    return trim($value) == $value;
});