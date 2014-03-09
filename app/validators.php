<?php

Validator::extend('trim', function($attribute, $value, $parameters)
{
    return trim($value) == $value;
});

Validator::extend('alpha_num_spaces', function($attribute, $value, $parameters)
{
	return strlen($value) == mb_strlen($value, 'utf-8');
});