<?php

class InvalidSongNameException extends InvalidSongException
{
    public function __construct(string $message = "Song name should be between 3 and 30 symbols.",
                                int $code = 0,
                                Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}