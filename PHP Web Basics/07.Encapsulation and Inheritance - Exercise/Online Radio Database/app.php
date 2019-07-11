<?php
spl_autoload_register();

$songsCount = intval(readline());
$count = 0;
$secs = 0;

for ($i = 0; $i < $songsCount; $i++) {
    list($artistName, $songName, $songLength) = explode(';', readline());
    list($minutes, $seconds) = explode(':', $songLength);

    try {
        if (strlen($artistName) < 3 || strlen($artistName) > 20) {
            throw new InvalidArtistNameException();
        }

        if (strlen($songName) < 3 || strlen($songName) > 30) {
            throw new InvalidSongNameException();
        }

        if ($minutes < 0 || $minutes > 14) {
            throw new InvalidSongMinutesException();
        }

        if ($seconds < 0 || $seconds > 59) {
            throw new InvalidSongSecondsException();
        }

        $count++;
        $secs += ($minutes * 60) + $seconds;

        echo 'Song added.' . PHP_EOL;
    } catch (InvalidSongException $e) {
        echo $e->getMessage();
    }
}

echo "Songs added: $count" . PHP_EOL;

$hours = floor($secs / 3600);
$minutes = str_pad(floor(($secs / 60) % 60), 2, '0', STR_PAD_LEFT);
$seconds = str_pad($secs % 60, 2, '0', STR_PAD_LEFT);

echo "Playlist length: {$hours}h {$minutes}m {$seconds}s";
