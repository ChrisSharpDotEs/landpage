<?php
namespace Back\App;
require './autoload.php';

use Back\App\Controller\WebController;

use Error;
use Exception;
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
        require "./Controller/" . $controllerName . ".php";

        $controller = new $controllerName();

        $controller->$actionName();

    } catch (Error $e){
        echo "Error: " . $e->getMessage();
    }
    //$controller -> $actionName();
}

try {
    print_r(scandir("./"));
    echo $url;
    routeRequest($url);
} catch (Error $e) {
    var_dump($e->getMessage());
} catch (Exception $e){
    var_dump($e);
}