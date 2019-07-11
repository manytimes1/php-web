<?php

namespace Core\Http\Session;

interface SessionInterface
{
    public function getAttribute(string $name, $default = null);

    public function setAttribute(string $name, string $value);

    public function addFlashMessage(string $type, string $message);

    public function getFlashMessage(string $type, array $default = []);

    public function hasMessage(string $type);

    public function destroy();
}
