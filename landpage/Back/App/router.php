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

    list($controllerName, $method) = explode("/", $url);

    $controllerAction = $routes[$url] ?? null;
    
    if(!$controllerAction){
        echo json_encode([
            "status"=> "error",
            "response_code" => 404,
            "message"=> "No se encuentra esa dirección",
            "debug" => $url,
            "debug2" => $controllerAction
        ]);
        exit;
    }
    
    list($controllerName, $actionName) = explode("/", $controllerAction);
    
    try{
        switch($controllerName){
            case "CustomerController":
                $controller = new CustomerController();
                $controller->$actionName();
                break;
            case "ComercialController":
                $controller = new ComercialController();
                $controller->$actionName();
                break;
            case "TestController":
                $controller = new TestController();
                $controller->$actionName();
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