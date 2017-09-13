<?php

namespace Classes\Methods;

class CheckToken extends AbstractMethod
{
    public function getCurlOptions()
    {
        return array();
    }

    public function getType()
    {
        return 'get';
    }

    public function getUrl()
    {
        return 'main/check-token';
    }

    public function tokenRequired()
    {
        return false;
    }
}