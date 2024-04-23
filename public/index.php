<?php
    session_start();

    require '../src/router.php';
    try{
        $url = $_SERVER['REQUEST_URI'];
        if(str_contains($url,'?')){
            $url = str_replace('/php/public/index.php?', '', $url);
            routeRequest($url);
        } else{
            routeRequest($url);
        }
    }
    catch(Error $e){
        var_dump ($e->getMessage());
    }