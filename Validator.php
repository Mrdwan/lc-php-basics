<?php

class Validator
{
    public static function string($value, $min = 1, $max = INF)
    {
        $valueLength = strlen(trim($value));

        return $valueLength >= $min && $valueLength <= $max;
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}