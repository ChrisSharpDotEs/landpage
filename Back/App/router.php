<?php
require '../../vendor/autoload.php';

use Controller\WebController;

function routeRequest($url){
    $routes = array(
        '/' => 'WebController/index',
        '/users' => 'UserController/findAll',
        '/getCustomers' => 'WebController/getCustomers',
        '/getCitas' => 'WebController/getCitas'
    );

    $controllerAction = $routes[$url] ?? null;
    
    if(!$controllerAction){
        http_response_code((404));
        header("Location: ../../proyecto-front/public/error/notfound.html");
        exit;
    }

    list($controllerName, $actionName) = explode("/", $controllerAction);
    
    try{
        $controller = null;
        switch($controllerName){
            case "WebController":
                $controller = new WebController();
                break;
                
        }

        $controller->$actionName();

    } catch (Error $e){
        echo "Error: " . $e->getMessage() . " on line " . $e->getLine();
        //print_r($e->getTrace());
    }
}

try {
    routeRequest($url);
} catch (Error $e) {
    echo ($e->getMessage());
} catch (Exception $e){
    var_dump($e);
}