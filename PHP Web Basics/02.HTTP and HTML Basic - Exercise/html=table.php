<?php
if (isset($_GET['name']) && isset($_GET['phone'])
    && isset($_GET['age']) && isset($_GET['address'])) {
    $name = htmlspecialchars($_GET['name']);
    $phone = htmlspecialchars($_GET['phone']);
    $age = htmlspecialchars($_GET['age']);
    $address = htmlspecialchars($_GET['address']);

    echo "<table border='2'>"
        . "<tr>"
        . "<td style='background-color:orange'>Name</td>"
        . "<td>$name</td>"
        . "</tr>"
        . "<tr>"
        . "<td style='background-color:orange'>Phone number</td>"
        . "<td>$phone</td>"
        . "</tr>"
        . "<tr>"
        . "<td style='background-color:orange'>Age</td>"
        . "<td>$age</td>"
        . "</tr>"
        . "<tr>"
        . "<td style='background-color:orange'>Address</td>"
        . "<td>$address</td>"
        . "</tr>"
        . "<table/>";
}
