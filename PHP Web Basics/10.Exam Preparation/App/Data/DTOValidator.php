<?php

namespace App\Data;

class DTOValidator
{
    public static function validate($min, $max, $value, $type, $fieldName)
    {
        if ($type === "text") {
            if (mb_strlen($value) < $min || mb_strlen($value) > $max) {
                throw new \PDOException("{$fieldName} must be between $min and $max characters!");
            }
        } else if ($type === "number") {
            if ($value < $min || $value > $max) {
                throw new \PDOException("{$fieldName} must be between $min and $max!");
            } else {
                throw new \PDOException("Please enter number!");
            }
        }
    }
}