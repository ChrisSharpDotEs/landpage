<?php
namespace Back\App\Controller;

use Back\App\Service\UserService;

class WebController {
    public function __construct(){}

    public function getCustomers(){
        $userService = new UserService();

        $result = $userService -> findAll();

        echo json_encode($result);
    }

    public function getCitas(){
        $userService = new UserService();

        $result = $userService -> obtenerCitas();

        echo json_encode($result);
    }
}