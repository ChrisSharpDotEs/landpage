<?php
    session_start();
    require '../src/router.php';
    
    try{
        $url = $_SERVER['REQUEST_URI'];
        if(str_contains($url,'?')){
            $url = str_replace('/php/public/index.php?', '', $url);
        } else{
            $url = str_replace('/php/public', '', $url);
        }
        routeRequest($url, null);
    }
    catch(Error $e){
        var_dump ($e->getMessage());
    }