<?php
$month = intval(readline());
$months = ["January", "February", "March", "April", "May", "June", "July",
    "August", "September", "October", "November", "December"];

if ($month >= 1 && $month <= 12) {
    echo $months[$month - 1];
} else {
    echo "Invalid Month!";
}
