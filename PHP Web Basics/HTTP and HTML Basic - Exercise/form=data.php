<?php
if (isset($_GET['name']) && isset($_GET['age'])
    && isset($_GET['gender'])) {
    $name = htmlspecialchars($_GET['name']);
    $age = htmlspecialchars($_GET['age']);
    $gender = htmlspecialchars($_GET['gender']);

    echo "<p>My name is $name. I am $age years old. I am $gender.</p>";
}
