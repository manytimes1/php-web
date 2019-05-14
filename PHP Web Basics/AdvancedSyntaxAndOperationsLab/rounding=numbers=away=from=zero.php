<?php
$numbers = explode(' ', readline());

foreach ($numbers as $number) {
    $roundedNum = round($number, 0, PHP_ROUND_HALF_UP);
    echo "$number => $roundedNum" . PHP_EOL;
}
