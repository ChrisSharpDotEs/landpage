<?php
use Util\ValidateData;
use Service\UserService;
use Util\EmailManager;

class WebController{
    public function index(){
        require '../src/views/header.php';
    }

    public function getCustomers(){
        $userService = new UserService();

        $result = $userService -> findAll();

        print json_encode($result);
        
    }

    public function getCitas(){
        $userService = new UserService();

        $result = $userService -> obtenerCitas();

        print json_encode($result);
        
    }
}