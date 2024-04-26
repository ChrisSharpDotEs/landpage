<?php
function routeRequest(string $url, $param){
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
    
    require './Controller/' . $controllerName . '.php';

    $controller = new $controllerName();
    $controller -> $actionName($param);
}

try {
    require "../autoload.php";

    $url = $_SERVER['REQUEST_URI'];
    if (str_contains($url, '?')) {
        $url = str_replace('/php/proyecto-back/src/router.php?', '', $url);
    } else {
        $url = str_replace('/php/proyecto-front/public', '', $url);
    }
    routeRequest($url, null);
} catch (Error $e) {
    var_dump($e->getMessage());
} catch (Exception $e){
    var_dump($e);
}