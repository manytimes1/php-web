<?php

namespace Core\Http\Session;

class Session implements SessionInterface
{
    private $sessions;

    public function __construct(array &$attributes)
    {
        $this->sessions = &$attributes;
    }

    public function getAttribute(string $name, $default = null)
    {
        return key_exists($name, $this->sessions) ? $this->sessions[$name] : $default;
    }

    public function setAttribute(string $name, string $value)
    {
        $this->sessions[$name] = $value;
    }

    public function addFlashMessage(string $type, string $message)
    {
        $this->sessions[$type][] = $message;
    }

    public function getFlashMessage(string $type, array $default = [])
    {
        if (!$this->hasMessage($type)) {
            return $default;
        }

        $result = $this->sessions[$type];
        unset($this->sessions[$type]);

        return $result;
    }

    public function hasMessage(string $type)
    {
        return key_exists($type, $this->sessions) && $this->sessions[$type];
    }

    public function destroy()
    {
        unset($this->sessions);
        session_destroy();
    }
}
