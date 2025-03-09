<?php

namespace App\Enums;

use ReflectionClass;

class BaseEnum
{
    /**
     * Get all contants
     *
     * @return array
     */
    public static function all(): array
    {
        return (new ReflectionClass(static::class))->getConstants();
    }
}