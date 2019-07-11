<?php
$integers = explode(' ', readline());
$rotations = intval(readline());
$sum = array_fill(0, count($integers), 0);

for ($i = 0; $i < $rotations; $i++) {
    $lastElement = array_pop($integers);
    array_unshift($integers, $lastElement);

    for ($j = 0; $j < count($integers); $j++) {
        $sum[$j] += $integers[$j];
    }
}

echo implode(' ', $sum);
