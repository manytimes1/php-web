<?php
$input = explode(', ', readline());
$elements = [];

foreach ($input as $element) {
    if (!key_exists($element, $elements)) {
        $elements[$element] = 1;
    } else {
        $elements[$element]++;
    }
}

foreach ($elements as $element => $count) {
    if ($count > 1) {
        unset($elements[$element]);
    }
}

echo implode(' ', array_keys($elements));
