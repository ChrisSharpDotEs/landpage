<?php
require "../autoload.php";
use Controller\WebController;
function routeRequest(string $url, $param){
    $routes = array(
        '/' => 'WebController/index',
        '/users' => 'UserController/findAll'
    );

    $controllerAction = $routes[$url] ?? null;

    if(!$controllerAction){
        http_response_code((404));
        header("Location: ../src/views/error/notfound.html");
        exit;
    }
    list($controllerName, $actionName) = explode("/", $controllerAction);
    
    require '../src/Controller/' . $controllerName . '.php';

    $controller = new $controllerName();
    $controller -> $actionName($param);
    
}