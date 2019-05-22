<?php
$numbers = explode(' ', readline());
$maxCount = 0;
$mostFrequent = 0;

for ($i = 0; $i < count($numbers); $i++) {
    $currentCount = 0;

    for ($j = 0; $j < count($numbers); $j++) {
        if ($numbers[$i] == $numbers[$j]) {
            $currentCount++;

            if ($currentCount > $maxCount) {
                $maxCount = $currentCount;
                $mostFrequent = $numbers[$i];
            }
        }
    }
}

echo $mostFrequent;
