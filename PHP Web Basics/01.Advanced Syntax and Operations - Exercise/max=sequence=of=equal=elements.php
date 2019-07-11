<?php
$integers = explode(' ', readline());
$maxCount = 0;
$maxSequence = 0;

for ($i = 0; $i < count($integers); $i++) {
    $currentCount = 0;

    for ($j = $i; $j < count($integers); $j++) {
        if ($integers[$i] == $integers[$j]) {
            $currentCount++;

            if ($currentCount > $maxCount) {
                $maxCount = $currentCount;
                $maxSequence = $integers[$i];
            }
        } else {
            break;
        }
    }
}

for ($i = 0; $i < $maxCount; $i++) {
    echo $maxSequence . ' ';
}
