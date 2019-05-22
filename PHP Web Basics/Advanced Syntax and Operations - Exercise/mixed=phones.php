<?php
$phoneBook = [];

while (($input = readline()) !== 'Over') {
    $data = explode(' : ', $input);

    if (preg_match('/^[\d]+$/', $data[0])) {
        $phoneBook[$data[1]] = $data[0];
    } else {
        $phoneBook[$data[0]] = $data[1];
    }
}
ksort($phoneBook);

foreach ($phoneBook as $name => $phone) {
    echo "$name -> $phone" . PHP_EOL;
}
