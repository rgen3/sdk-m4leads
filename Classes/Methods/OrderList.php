<?php

namespace Classes\Methods;

class OrderList extends AbstractMethod
{
    public function getCurlOptions()
    {
        return array();
    }

    public function getUrl()
    {
        return 'order/order-list';
    }

    public function getType()
    {
        return 'get';
    }

    public function tokenRequired()
    {
        return true;
    }

    public function waitAnswer()
    {
        return true;
    }
}