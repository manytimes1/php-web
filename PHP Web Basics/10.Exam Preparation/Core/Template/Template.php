<?php

namespace Core\Template;

use Core\Http\Session\SessionInterface;

class Template implements TemplateInterface
{
    const TEMPLATE_DIRECTORY = "App/Templates/";
    const TEMPLATE_EXTENSION = ".php";

    /**
     * @var SessionInterface
     */
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function render(string $templateName, $data = null, array $errors = [])
    {
        require_once self::TEMPLATE_DIRECTORY
            . $templateName
            . self::TEMPLATE_EXTENSION;
    }

    public function getFlash(string $type)
    {
        return $this->session->getFlashMessage($type);
    }
}