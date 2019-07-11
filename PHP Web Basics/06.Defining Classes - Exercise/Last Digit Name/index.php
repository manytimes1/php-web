<?php
require_once 'Number.php';

$input = intval(readline());
$number = new Number($input);
echo $number->getNameOfLastDigit();
