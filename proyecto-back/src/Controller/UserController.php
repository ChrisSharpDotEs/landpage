<?php

use Service\UserService;

class UserController{
    public function findUserById($email){
        $userService = new UserService();

        $result = $userService -> findUserByEmail($email);

        $userService -> close();

        header('Content-Type: application/json');
        print(json_encode($result));
    }

    public function findAll(){
        $userService = new UserService();

        $result = $userService -> findAll();

        $userService -> close();

        header('Content-Type: application/json');
        print(json_encode($result));
    }

    public function create($username, $useremail, $userpass){
        $userService = new UserService();
        $result = $userService -> create($username, $useremail, $userpass);
        $userService -> close();
        return $result;
    }
}