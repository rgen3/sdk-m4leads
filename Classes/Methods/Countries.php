<?php

namespace Classes\Methods;

class Countries extends AbstractMethod
{
    public function setData($data)
    {

    }

    public function tokenRequired()
    {
        return false;
    }

    public function waitAnswer()
    {
        return true;
    }

    public function processResult($data)
    {
        $result = json_decode($data, true);
        $this->setResult($result);
        return $this;
    }

    public function getCurlOptions()
    {
        return array();
    }

    public function getType()
    {
        return 'GET';
    }

    public function getData()
    {
        return array();
    }

    public function getUrl()
    {
        return 'directory/get-countries';
    }
}
