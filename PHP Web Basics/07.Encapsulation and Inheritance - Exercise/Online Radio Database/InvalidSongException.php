<?php

class InvalidSongException extends Exception
{
    public function __construct(string $message = "Invalid song.",
                                int $code = 0,
                                Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}