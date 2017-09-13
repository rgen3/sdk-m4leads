<?php

namespace Classes;

use Classes\Methods\AbstractMethod;
use Classes\Methods\Auth;
use Classes\Methods\Countries;
use Interfaces\Method;

/**
 * Class CurlFabric
 * @package Classes
 */
class CurlFabric
{
    private static $debug = false;

    public static function enableDebug()
    {
        static::$debug = true;
    }

    public static function disableDebug()
    {
        static::$debug = fasle;
    }

    /**
     * @param $method
     * @param $options
     * @return Method
     * @throws \Exception
     */
    public static function init($method, $options)
    {
        $method = ucfirst($method);
        $className = "Classes\\Methods\\{$method}";
        if (!class_exists($className))
        {
            throw new \Exception("Undefined method {$method}");
        }

        $class = new $className;

        $class->setData($options);

        if ($class->tokenRequired() && AbstractMethod::getToken() === null)
        {
            $token = AbstractMethod::getToken();
            $auth = static::init('auth', array(

            ));
        }

        $request = new Curl($class);

        $request->type()->setTrace(static::$debug)->request();


        return $class;
    }
}