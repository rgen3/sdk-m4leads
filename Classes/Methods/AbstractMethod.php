<?php

namespace Classes\Methods;

use Interfaces\Method;

abstract class AbstractMethod implements Method
{
    private static $token = null;
    private static $userId = null;

    private $data;

    private $debug = false;
    private $result;
    public function __get($name)
    {
        $methodName = 'get' . ucfirst($name);
        if (method_exists($this, $methodName))
        {
            return call_user_func(array($this, $methodName));
        }

        throw new \Exception("Undefined property {$name}");
    }

    public function __debugInfo()
    {
        return array(
            'responseData' => $this->getResult(),
            'requestData' => $this->data
        );
    }

    public function setDebug($debug)
    {
        $this->debug = $debug;
        return $this;
    }

    public function enableDebug()
    {
        $this->debug = true;
        return $this;
    }

    public function disableDebug()
    {
        $this->debug = false;
        return $this;
    }

    public static function setToken($token)
    {
        self::$token = $token;
    }

    public static function getToken()
    {
        return self::$token;
    }

    public static function getUserId()
    {
        return self::$userId;
    }

    public function setResult($result)
    {
        $this->result = $result;
        return $this;
    }

    public function getResult()
    {
        return $this->result['data'];
    }

    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    public function getData()
    {
        return $this->data;
    }

    public function waitAnswer()
    {
        return true;
    }

    public function getInfo()
    {
        return $this->result['information'];
    }

    public function processResult($data)
    {
        $data = json_decode($data, true);
        $this->setResult($data);
        return $this;
    }
}