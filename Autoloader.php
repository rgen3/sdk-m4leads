<?php

spl_autoload_register(function($class){
    $filePath = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $filePath = trim($filePath, DIRECTORY_SEPARATOR);
    $filePath = __DIR__ . DIRECTORY_SEPARATOR . $filePath;
    $fileExtension = '.php';

    $fullPath = $filePath . $fileExtension;
    if (!file_exists($fullPath))
    {
        throw new Exception("Class {$class} doesn't exists");
    }

    require_once $fullPath;
});