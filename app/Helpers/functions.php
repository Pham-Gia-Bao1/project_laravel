<?php
// define functions here

function isUppercase($value, $message, $fail)
{
    if ($value != mb_strtoupper($value, 'UTF-8')) {
        $fail($message);
    };
};
