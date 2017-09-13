<?php

namespace Classes;

use Classes\Methods\AbstractMethod;

class Curl {

    public static $defaultCurlTimeout = 30;
    public static $apiUrl = 'http://api.m4leads.com';

    public $options = array(
        CURLOPT_RETURNTRANSFER => true,
    );

    /**
     * @var \Interfaces\Method
     */
    private $method;

    /**
     * @var resource cURL
     */
    private $curl;

    private $trace = false;

    private $result = null;

    public function __construct(\Interfaces\Method $method)
    {
        $this->method = $method;
        $this->curl = curl_init();
        $this->options = array_replace($this->options, $method->getCurlOptions());
    }

    public function __destruct()
    {
        $this->close();
    }

    public function __clone()
    {
        $this->result = null;
        return $this->curl;
    }

    public function __invoke()
    {
        // TODO: Implement __invoke() method.
    }

    public function __debugInfo()
    {
        return array(
            'info' => curl_getinfo($this->curl),
            'errno' => curl_errno($this->curl),
            'error' => curl_error($this->curl),
            'version' => curl_version()
        );
    }

    public function type()
    {
        if ($this->method->waitAnswer())
        {
            return $this->sync();
        }

        return $this->async();
    }

    public function async()
    {
        curl_setopt($this->curl, CURLOPT_TIMEOUT, 1);
        curl_setopt($this->curl, CURLOPT_NOSIGNAL, 1);
        return $this;
    }

    public function sync()
    {
        curl_setopt($this->curl, CURLOPT_NOSIGNAL, 0);
        curl_setopt($this->curl, CURLOPT_TIMEOUT, static::$defaultCurlTimeout);

        return $this;
    }

    public function enableTrace()
    {
        $this->trace = true;
        return $this;
    }

    public function disableTrace()
    {
        $this->trace = false;
        return $this;
    }

    public function traceEnabled()
    {
        return (bool) $this->trace;
    }

    public function setTrace($trace)
    {
        $this->trace = $trace;
        return $this;
    }

    public function returnTransfer()
    {
        return $this->options[CURLOPT_RETURNTRANSFER];
    }

    public function reset()
    {
        curl_reset($this->curl);
    }

    public function getResult()
    {
        if ($this->traceEnabled())
        {
            var_dump(curl_getinfo($this->curl));
        }

        $data = curl_exec($this->curl);

        if ($this->returnTransfer())
        {
            return $data;
        }

        return null;
    }

    public function prepareUrl()
    {
        $get = array();
        if ($this->method->tokenRequired())
        {
            $get = array('access-token' => AbstractMethod::getToken());
        }

        if ($this->isGet())
        {
            $get = array_merge($get, $this->method->getData());
        }

        $get = '?' . http_build_query($get);

        return static::$apiUrl . '/' . $this->method->getUrl() . $get;
    }

    public function setCurlData()
    {
        curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, strtoupper($this->method->getType()));
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, $this->method->getData());
        return $this;
    }

    public function setHeader($header)
    {
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, $header);
        return $this;
    }

    public function isGet()
    {
        return strtolower($this->method->getType()) === 'get';
    }

    public function request()
    {
        if ($this->traceEnabled())
        {
            var_dump(curl_version());
        }

        curl_setopt($this->curl, CURLOPT_URL, $this->prepareUrl());
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, $this->options[CURLOPT_RETURNTRANSFER]);

        if (!$this->isGet())
        {
            $this->setCurlData();
        }

        $result = $this->getResult();

        return $this->method->processResult($result)->getResult();
    }

    private function close()
    {
        curl_close($this->curl);
    }
}