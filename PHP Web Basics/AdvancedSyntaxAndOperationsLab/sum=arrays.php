<?php
$firstArray = array_map('intval', explode(' ', readline()));
$secondArray = array_map('intval', explode(' ', readline()));
$firstLength = count($firstArray);
$secondLength = count($secondArray);
$maxLength = max($firstLength, $secondLength);
$result = [];

for ($i = 0; $i < $maxLength; $i++) {
    $result[$i] = $firstArray[$i % $firstLength] + $secondArray[$i % $secondLength];
}

echo implode(' ', $result);
