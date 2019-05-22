<?php
$word = str_split(strtolower(readline()));
$letters = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l',
    'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];

foreach ($word as $letter) {
    echo "$letter -> " . array_search($letter, $letters) . PHP_EOL;
}
