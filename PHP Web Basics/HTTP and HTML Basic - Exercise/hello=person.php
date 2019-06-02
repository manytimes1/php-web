<?php
if (isset($_GET['person'])) {
    echo 'Hello, ' . htmlspecialchars($_GET['person']) . '!';
}