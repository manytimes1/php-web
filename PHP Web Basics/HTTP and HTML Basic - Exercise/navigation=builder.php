<?php
if (isset($_GET['categories']) && isset($_GET['tags']) && isset($_GET['months'])) {
    $categories = explode(', ', $_GET['categories']);
    $tags = explode(', ', $_GET['tags']);
    $months = explode(', ', $_GET['months']);

    echo "<h2>Categories</h2>" . PHP_EOL;
    printResult($categories);
    echo "<h2>Tags</h2>" . PHP_EOL;
    printResult($tags);
    echo "<h2>Months</h2>" . PHP_EOL;
    printResult($months);
}

function printResult($list)
{
    echo "<ul>" . PHP_EOL;

    foreach ($list as $item) {
        echo "<li>$item</li>" . PHP_EOL;
    }

    echo "</ul>" . PHP_EOL;
}
