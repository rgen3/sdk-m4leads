<?php

namespace Classes\Methods;

class Auth extends AbstractMethod
{
    private $data;
    public function getCurlOptions()
    {
        return array();
    }

    public function tokenRequired()
    {
        return false;
    }

    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    public function getData()
    {
        return array(
            'username' => $this->data['login'],
            'password' => $this->data['password']
        );
    }

    public function getType()
    {
        return 'post';
    }

    public function getUrl()
    {
        return 'main/token';
    }

    public function getResult()
    {
        return parent::getResult(); // TODO: Change the autogenerated stub
    }


}