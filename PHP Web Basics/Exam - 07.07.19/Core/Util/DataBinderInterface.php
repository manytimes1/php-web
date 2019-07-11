<?php

namespace Core\Util;

interface DataBinderInterface
{
    public function bind(array $formData, $className);

    public function bindReflection(array $formData, $className);
}
