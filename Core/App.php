<?php
namespace Core;

class App
{

    protected static $contaier;

    public static function setContainer($contaier)
    {
        static::$contaier = $contaier;
    }

    public static function container()
    {
        return static::$contaier;
    }

    public static function bind($key, $resolver) {

            static::container()->bind($key, $resolver);
    }

    public static function resolve($key) {
        
        return static::container()->resolve($key);
    }
}
