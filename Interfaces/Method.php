<?php

namespace Interfaces;

interface Method
{
    public function setData($data);
    public function tokenRequired();

    public function waitAnswer();

    public function getType();

    public function getUrl();

    public function getData();

    public function getInfo();

    /**
     * @param $data
     * @return Method
     */
    public function processResult($data);

    public function getResult();

    /**
     * @return array
     */
    public function getCurlOptions();
}