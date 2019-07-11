<?php
$number = intval(readline());
$operations = explode(', ', readline());

$calculate = function($operation, $number) {
    switch ($operation) {
        case 'chop':
            $number /= 2;
            break;
        case 'dice':
            $number = sqrt($number);
            break;
        case 'spice':
            $number++;
            break;
        case 'bake':
            $number *= 3;
            break;
        case 'fillet':
            $number *= 0.8;
            break;
    }
    return $number;
};

foreach ($operations as $operation) {
    $number = $calculate($operation, $number);
    echo $number . PHP_EOL;
}
