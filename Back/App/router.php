<?php
require '../../vendor/autoload.php';

use Controller\CustomerController;
use Controller\ComercialController;
use Controller\TestController;

function routeRequest($url){
    $routes = array(
        '/' => 'WebController/index',
        '/comerciales' => 'ComercialController/findAll',
        '/getCustomersByComercial' => 'CustomerController/getCustomersByComercial',
        '/test' => 'TestController/test'
    );

    list($controllerName, $actionName, $param) = explode("/", $url);
    $controllerAction = $routes[$controllerName . "/" . $actionName] ?? null;

    if(!$controllerAction){
        http_response_code((404));
        header("Location: ../../proyecto-front/public/error/notfound.html");
        exit;
    }
    
    list($controllerName, $actionName) = explode("/", $controllerAction);
    
    try{
        switch($controllerName){
            case "CustomerController":
                $controller = new CustomerController();
                $controller->$actionName($param);
                break;
            case "ComercialController":
                $controller = new ComercialController();
                $controller->$actionName($param);
                break;
            case "TestController":
                $controller = new TestController();
                $controller->$actionName($param);
                break;
        }

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