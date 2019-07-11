<?php

namespace Core\Http\Response;

class RedirectResponse
{
    private $targetUrl;

    public function __construct(string $url)
    {
        $this->setTargetUrl($url);
    }

    /**
     * @return mixed
     */
    public function getTargetUrl()
    {
        return $this->targetUrl;
    }

    /**
     * @param mixed $url
     */
    public function setTargetUrl($url)
    {
        $this->targetUrl = $url;

        header("Location: $url");
    }
}