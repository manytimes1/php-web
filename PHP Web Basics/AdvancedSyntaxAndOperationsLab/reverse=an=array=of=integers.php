<?php
$lines = intval(readline());
$numbers = [];

for ($i = 0; $i < $lines; $i++) {
    $numbers[$i] = intval(readline());
}

for ($i = $lines - 1; $i >= 0; $i--) {
    echo "$numbers[$i] ";
}
