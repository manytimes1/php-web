<?php
$products = [];

while (($input = readline()) !== 'shopping time') {
    $data = explode(' ', $input);
    $product = $data[1];
    $quantity = intval($data[2]);

    if (!key_exists($product, $products)) {
        $products[$product] = 0;
    }
    $products[$product] += $quantity;
}

while (($input = readline()) !== 'exam time') {
    $data = explode(' ', $input);
    $product = $data[1];
    $quantity = intval($data[2]);

    if (!key_exists($product, $products)) {
        printf("%s doesn't exist" . PHP_EOL, $product);
    } else {
        if ($products[$product] > 0) {
            $products[$product] -= $quantity;
        } else {
            printf("%s out of stock" . PHP_EOL, $product);
        }
    }
}

foreach ($products as $product => $quantity) {
    if ($quantity > 0) {
        printf("%s -> %d" . PHP_EOL, $product, $quantity);
    }
}
