<?php

class InvalidSongLengthException extends InvalidSongException
{
    public function __construct(string $message = "Invalid song length.",
                                int $code = 0,
                                Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}