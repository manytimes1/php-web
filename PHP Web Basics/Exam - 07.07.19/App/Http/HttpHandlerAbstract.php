<?php

namespace App\Http;

use Core\Http\Response\RedirectResponse;
use Core\Http\Session\SessionInterface;
use Core\Template\TemplateInterface;
use Core\Util\DataBinderInterface;

abstract class HttpHandlerAbstract
{
    /**
     * @var TemplateInterface
     */
    private $template;

    /**
     * @var DataBinderInterface
     */
    protected $dataBinder;

    /**
     * @var SessionInterface
     */
    protected $session;

    public function __construct(TemplateInterface $template,
                                DataBinderInterface $dataBinder,
                                SessionInterface $session)
    {
        $this->template = $template;
        $this->dataBinder = $dataBinder;
        $this->session = $session;
    }

    protected function addFlash(string $type, string $message)
    {
        return $this->session->addFlashMessage($type, $message);
    }

    protected function redirect(string $url)
    {
        return new RedirectResponse($url);
    }

    protected function render(string $templateName, $data = null, array $errors = [])
    {
        return $this->template->render($templateName, $data, $errors);
    }
}