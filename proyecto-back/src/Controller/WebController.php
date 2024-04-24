<?php
use Util\ValidateData;

class WebController{
    public function index(){
        require '../src/views/header.php';
    }

    public function test(){
        $validate = new ValidateData();
        $result = $validate -> validarNombre($_POST['nombre']);
        header('Content-Type: application/json');
        echo json_encode($result);
    }
}