<?php
use Service\UserService;

class UserController{
    public function index($email){
        $userService = new UserService();

        $result = $userService -> findUserByEmail($email);

        $userService -> close();

        header('Content-Type: application/json');
        print(json_encode($result));
    }
}