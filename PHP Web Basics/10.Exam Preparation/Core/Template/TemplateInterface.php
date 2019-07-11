<?php

namespace Core\Template;

interface TemplateInterface
{
    public function render(string $templateName, $data = null, array $errors = []);

    public function getFlash(string $type);
}