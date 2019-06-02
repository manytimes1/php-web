<?php
if (isset($_GET['input'])) {
    $text = strtolower($_GET['input']);
    $words = preg_split('/[^A-Za-z]+/', $text, -1, PREG_SPLIT_NO_EMPTY);
    $result = [];

    foreach ($words as $word) {
        if (!key_exists($word, $result)) {
            $result[$word] = 1;
        } else {
            $result[$word]++;
        }
    }

    $output = "<table border='2'>";

    foreach ($result as $word => $count) {
        $output .= "<tr><td>$word</td><td>$count</td></tr>";
    }
    $output .= "</table>";
    echo $output;
}
