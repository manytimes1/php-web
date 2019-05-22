<?php
$integers = explode(' ', readline());
$sum = 0;

foreach ($integers as $integer) {
    $sum += intval(strrev($integer));
}

echo $sum;
