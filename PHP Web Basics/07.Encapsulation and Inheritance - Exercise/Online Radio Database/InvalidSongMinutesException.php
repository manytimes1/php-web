<?php

class InvalidSongMinutesException extends InvalidSongLengthException
{
    public function __construct(string $message = "Song minutes should be between 0 and 14.",
                                int $code = 0,
                                Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}