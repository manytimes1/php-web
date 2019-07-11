<?php

class InvalidSongSecondsException extends InvalidSongLengthException
{
    public function __construct(string $message = "Song seconds should be between 0 and 59. \n",
                                int $code = 0,
                                Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}