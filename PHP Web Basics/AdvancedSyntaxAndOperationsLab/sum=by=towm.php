<?php
$input = explode(', ', readline());
$townsIncome = [];

for ($i = 0; $i < count($input); $i += 2) {
    list($town, $income) = [$input[$i], $input[$i + 1]];

    if (!isset($townsIncome[$town])) {
        $townsIncome[$town] = $income;
    } else {
        $townsIncome[$town] += $income;
    }
}

foreach ($townsIncome as $town => $income) {
    printf("%s => %d" . PHP_EOL, $town, $income);
}
