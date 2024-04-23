<?php
require "../autoload.php";

function routeRequest(string $url){
    $routes = array(
        '/' => 'WebController/index',
        '/users' => 'UserController/index/email@example.com'
    );

    $controllerAction = $routes[$url] ?? null;

    if(!$controllerAction){
        http_response_code((404));
        header("Location: ../src/views/error/notfound.html");
        exit;
    }

    list($controllerName, $actionName, $param) = explode("/", $controllerAction);

    require_once 'Controller/' . $controllerName . '.php';

    $controller = new $controllerName();
    $controller -> $actionName($param);
}