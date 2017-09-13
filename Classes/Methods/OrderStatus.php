<?php

namespace Classes\Methods;

class OrderStatus extends AbstractMethod
{
    public function getCurlOptions()
    {
        return array();
    }

    public function getUrl()
    {
        return 'order/get-order-status';
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

    public function getData()
    {
        $data = parent::getData();
        return array('ordersId' => implode(',', $data['ordersId']));
    }
}