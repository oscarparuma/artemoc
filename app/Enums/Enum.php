<?php

namespace Artemoc\Enums;

use ReflectionClass;

abstract class Enum {
    static function getKeys() {
        $class = new ReflectionClass(get_called_class());
        return array_keys($class->getConstants());
    }

    final public static function toArray() {
        return (new ReflectionClass(static::class))->getConstants();
    }
}