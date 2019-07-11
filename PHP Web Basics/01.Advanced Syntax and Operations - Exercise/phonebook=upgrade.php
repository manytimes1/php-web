<?php
$phoneBook = [];

while (($input = readline()) !== 'END') {
    $data = explode(' ', $input);

    switch ($data[0]) {
        case 'A':
            $phoneBook[$data[1]] = $data[2];
            break;
        case 'S':
            if (key_exists($data[1], $phoneBook)) {
                echo "$data[1] -> {$phoneBook[$data[1]]}" . PHP_EOL;
            } else {
                echo "Contact $data[1] does not exist." . PHP_EOL;
            }
            break;
        case 'ListAll':
            ksort($phoneBook);

            foreach ($phoneBook as $name => $phone) {
                echo "$name -> $phone" . PHP_EOL;
            }
            break;
    }
}
