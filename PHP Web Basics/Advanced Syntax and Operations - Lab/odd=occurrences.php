<?php
$words = explode(' ', strtolower(readline()));
$wordsCount = [];

foreach ($words as $word) {
    if (!key_exists($word, $wordsCount)) {
        $wordsCount[$word] = 1;
    } else {
        $wordsCount[$word]++;
    }
}

$oddOccurrences = array_filter($wordsCount, 'odd');
echo implode(', ', array_keys($oddOccurrences));

function odd($var)
{
    return ($var & 1);
}
