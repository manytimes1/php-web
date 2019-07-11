<?php

class Smartphone implements Call, Browse
{
    /**
     * @param string $phoneNumber
     * @return string
     * @throws Exception
     */
    public function call(string $phoneNumber): string
    {
        if (!is_numeric($phoneNumber)) {
            throw new Exception("Invalid number!");
        }
        return "Calling... " . $phoneNumber;
    }

    /**
     * @param string $url
     * @return string
     * @throws Exception
     */
    public function browse(string $url): string
    {
        if (preg_match('~[0-9]~', $url)) {
            throw new Exception("Invalid URL!");
        }
        return "Browsing: $url!";
    }
}