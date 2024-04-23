<?php
    session_start();

    require '../src/router.php';
    try{
        $url = $_SERVER['REQUEST_URI'];
        $url = str_replace('/php/public', '', $url);
        
        routeRequest($url);
    }
    catch(Error $e){
        var_dump ($e->getMessage());
    }