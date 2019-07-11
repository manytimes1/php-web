<?php
$numbers = array_map('intval', explode(' ', readline()));
$isContainsTriples = false;

for ($i = 0; $i < count($numbers); $i++) {
    for ($j = $i + 1; $j < count($numbers); $j++) {
        $sum = $numbers[$i] + $numbers[$j];

        if (in_array($sum, $numbers)) {
            echo "$numbers[$i] + $numbers[$j] == $sum " . PHP_EOL;
            $isContainsTriples = true;
        }
    }
}

if (!$isContainsTriples) {
    echo 'No';
}
