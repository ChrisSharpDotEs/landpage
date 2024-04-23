<?php
function routeRequest(string $url){
    $routes = array(
        '/' => 'WebController@index'
    );

    $controllerAction = $routes[$url] ?? null;

    if(!$controllerAction){
        http_response_code((404));
        print_r($routes);
        print($url);

        # header("Location: ../src/views/error/notfound.html");
        exit;
    }

    list($controllerName, $actionName) = explode("@", $controllerAction);

    require_once 'Controller/' . $controllerName . '.php';

    $controller = new $controllerName();
    $controller -> $actionName();
}