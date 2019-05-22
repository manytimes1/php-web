<?php
$n = intval(readline());
$k = intval(readline());
$sequence[0] = 1;

for ($i = 1; $i < $n; $i++) {
    $sum = 0;

    for ($j = $i - 1; $j >= max(0, ($i - $k)); $j-- ) {
        $sum += $sequence[$j];
    }
    array_push($sequence, $sum);
}

echo implode(' ', $sequence);

