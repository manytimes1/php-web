<?php
$result = null;

if (isset($_GET['text'])) {
    $words = preg_split('/\W+/', $_GET['text']);
    $capitalWords = array_filter($words, function ($word) {
        return $word == strtoupper($word);
    });

    $result = implode(', ', $capitalWords);
}