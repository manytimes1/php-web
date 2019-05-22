<?php
$nums = array_map('intval', explode(' ', readline()));

while (count($nums) > 1) {
    $condensed = [];

    for ($i = 0; $i < count($nums) - 1; $i++) {
        $condensed[$i] = $nums[$i] + $nums[$i + 1];
    }
    $nums = $condensed;
}
echo $nums[0];
