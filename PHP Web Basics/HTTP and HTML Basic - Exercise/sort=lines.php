<?php
$sortedLines = null;

if (isset($_GET['lines'])) {
    $lines = explode(PHP_EOL, $_GET['lines']);
    asort($lines);
    $sortedLines = implode(PHP_EOL, $lines);
}