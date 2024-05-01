<?php
namespace Util;

class ValidateData
{
    public function __construct()
    {
    }

    public function validateName($nombre)
    {
        $nombre = trim($nombre);

        if (empty($nombre)) {
            return false;
        }

        if (!preg_match('/^[a-zA-Z\s]+$/', $nombre)) {
            return false;
        }

        if (strlen($nombre) < 3) {
            return false;
        }

        return true;
    }

    public function validateEmail($email){

    }

    public function validateUserSession($userSession){
        
    }
}