<?php
require '../../vendor/autoload.php';

use Controller\CustomerController;
use Controller\ComercialController;
use Controller\TestController;

function routeRequest($url){
    $routes = array(
        '/' => 'WebController/index',
        '/comerciales' => 'ComercialController/findAll',
        '/getCustomersByComercial' => 'CustomerController/getCustomersByComercial/1',
        '/test' => 'TestController/test'
    );

    list($controllerName, $method) = explode("/", $url);

    $controllerAction = $routes[$url] ?? null;
    
    if(!$controllerAction){
        echo json_encode([
            "status"=> "error",
            "response_code" => 404,
            "message"=> "No se encuentra esa dirección",
            "debug" => $url
        ]);
        exit;
    }

    list($controllerName, $actionName, $param) = explode("/", $controllerAction);
    
    switch($controllerName){
        case "CustomerController":
            $controller = new CustomerController();
            $controller->$actionName($param);
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
}

//Aquí se maneja todos los errores de PDO en controladores y modelos.
try {
    routeRequest($url);
} catch (Error $e) {
    echo json_encode($e->getMessage());
} catch (Exception $e){
    var_dump($e);
}