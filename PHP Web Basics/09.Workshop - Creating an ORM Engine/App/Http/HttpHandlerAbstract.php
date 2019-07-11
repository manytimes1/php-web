<?php

namespace App\Http;


use Core\DataBinderInterface;
use Core\TemplateInterface;

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

    public function __construct(TemplateInterface $template,
                                DataBinderInterface $dataBinder)
    {
        $this->template = $template;
        $this->dataBinder = $dataBinder;
    }

    protected function render(string $templateName, $data = null, array $errors = [])
    {
        return $this->template->render($templateName, $data, $errors);
    }

    protected function redirect(string $url)
    {
        header("Location: $url");
    }
}