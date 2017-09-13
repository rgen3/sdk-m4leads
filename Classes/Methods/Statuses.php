<?php

namespace Classes\Methods;

class Statuses extends AbstractMethod
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
        return 'directory/get-status-list';
    }

    public function tokenRequired()
    {
        return false;
    }
}