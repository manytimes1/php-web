<?php
$numbers = array_map('floatval', explode(' ', readline()));
$counts = [];
sort($numbers);

foreach ($numbers as $number) {
    $num = $number . '';

    if (!key_exists($num, $counts)) {
        $counts[$num] = 1;
    } else {
        $counts[$num]++;
    }
}

foreach ($counts as $key => $value) {
    printf("%s -> %d" . PHP_EOL, $key, $value);
}
