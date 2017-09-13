<?php

namespace Classes\Methods;

class OrderAdd extends AbstractMethod
{

    public function waitAnswer()
    {
        return false;
    }

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
        return 'order/add';
    }

    public function tokenRequired()
    {
        return false;
    }
}