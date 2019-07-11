<?php

namespace Core\Util;

class DataBinder implements DataBinderInterface
{
    public function bind(array $formData, $className)
    {
        $object = new $className();
        foreach ($formData as $key => $value) {
            $methodName = 'set' .  implode('',
                    array_map(function ($el) {
                        return ucfirst($el);
                    }, explode('_', $key)));
            if (method_exists($object, $methodName)) {
                $object->$methodName($value);
            }
        }
        return $object;
    }

    public function bindReflection(array $formData, $className)
    {
        $classInfo = new \ReflectionClass($className);
        $object = new $className();
        foreach ($formData as $key => $value) {
            $key=implode('',array_map(function ($el){
                return ucfirst($el);
            },explode('_',$key)));
            $key=lcfirst($key);
            if ($classInfo->hasProperty($key)) {
                $property = $classInfo->getProperty($key);
                $property->setAccessible(true);
                $property->setValue($object, $value);
            }
        }
        return $object;
    }
}
