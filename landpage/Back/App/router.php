<?php
require '../../vendor/autoload.php';

use Controller\CustomerController;
use Controller\ComercialController;
use Controller\TestController;

function routeRequest($url){
    #En cualquier caso la respuesta será un JSON
    header('Content-Type: application/json');

    $regex = "/[0-9]/";
    $id = "";

    preg_match($regex, $url, $matches);

    if(isset($matches) && count($matches) > 0){
        $id = intval( $matches[0] );
        $url = str_replace("/" . $id, "", $url);
    }

    $routes = array(
        '/' => 'WebController/index',
        '/comerciales' => 'ComercialController/findAll',
        '/getCustomersByComercial' => 'CustomerController/getCustomersByComercial/',
        '/getComercialCitas' => 'ComercialController/getComercialCitas/',
        '/test' => 'TestController/test'
    );

    list($controllerName) = explode("/", $url);

    $controllerAction = $routes[$url] ?? null;
    
    if(isset($controllerAction)  && isset($id)){
        $controllerAction .= "$id";
    }

    if(!$controllerAction){
        echo json_encode([
            "status"=> "error",
            "response_code" => 404,
            "message"=> "No se encuentra esa dirección",
            "debug" => [
                "url" => $url, 
                "matches" => $matches[0],
                "id" => $id,
                "test_matches" => str_replace("/$id", "", $url)
            ]
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
            $controller->$actionName($param);
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