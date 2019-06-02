<?php
if (isset($_GET['num1']) && isset($_GET['num2'])) {
    $num1 = floatval($_GET['num1']);
    $num2 = floatval($_GET['num2']);
    $sum = $num1 + $num2;
    echo "$num1 + $num2 = $sum";
}
