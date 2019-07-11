<?php
$input = readline();
$charsCount = [];

for ($i = 0; $i < strlen($input); $i++) {
    $char = $input[$i];

    if (!isset($charsCount[$char])) {
        $charsCount[$char] = 1;
    } else {
        $charsCount[$char]++;
    }
}

foreach ($charsCount as $char => $count) {
    printf("%s -> %d" . PHP_EOL, $char, $count);
}
