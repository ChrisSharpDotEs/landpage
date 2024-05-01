<?php
session_start();

spl_autoload_register(function ($class) {
    $file  = __DIR__ . '/App/' . str_replace('\\','/', $class) . '.php';
    if(file_exists($file)){
        require $file;
    }
});