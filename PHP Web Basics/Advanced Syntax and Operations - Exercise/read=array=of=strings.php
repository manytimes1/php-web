<?php
$sequence = explode(' ', readline());

for ($i = 0; $i < count($sequence); $i++) {
    echo $sequence[count($sequence) - $i - 1] . " ";
}
