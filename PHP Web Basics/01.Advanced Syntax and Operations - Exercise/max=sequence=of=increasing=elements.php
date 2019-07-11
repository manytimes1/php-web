<?php
$integers = explode(' ', readline());
$start = 0;
$maxCount = 0;

for ($i = 0; $i < count($integers); $i++) {
    $count = 0;

    for ($j = $i; $j < count($integers) - 1; $j++) {
        if ($integers[$j] < $integers[$j + 1]) {
            $count++;

            if ($count > $maxCount) {
                $maxCount = $count;
                $start = $i;
            }
        } else {
            break;
        }
    }
}

for ($i = 0; $i <= $maxCount; $i++) {
    echo $integers[$start + $i] . ' ';
}
