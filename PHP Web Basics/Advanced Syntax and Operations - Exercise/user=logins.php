<?php
$users = [];

while (($input = readline()) !== 'login') {
    $data = explode(' -> ', $input);
    $username = $data[0];
    $password = $data[1];

    if (!key_exists($username, $users)) {
        $users[$username] = [];
    }
    $users[$username] = $password;
}

$failedAttempts = 0;

while (($input = readline()) !== 'end') {
    $data = explode(' -> ', $input);
    $username = $data[0];
    $password = $data[1];

    if (key_exists($username, $users) && $users[$username] == $password) {
        printf("%s: logged in successfully" . PHP_EOL, $username);
    } else {
        printf("%s: login failed" . PHP_EOL, $username);
        $failedAttempts++;
    }
}
echo "unsuccessful login attempts: $failedAttempts";
