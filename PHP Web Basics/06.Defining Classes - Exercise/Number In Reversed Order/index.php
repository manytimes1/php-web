<?php
require_once 'DecimalNumber.php';

$input = readline();
$decimalNumber = new DecimalNumber($input);
echo $decimalNumber->reverseNumber();