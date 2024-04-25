<?php
use Util\ValidateData;
use Util\EmailManager;

class WebController{
    public function index(){
        require '../src/views/header.php';
    }

    public function test(){
        $validate = new ValidateData();
        
        $email = $_POST['your-email'];
        $subject = $_POST['your-subject'];
        $message = $_POST['your-message'];

        $valid = $validate->validarNombre($_POST['your-name']);
        $sent = EmailManager::send($email, $subject, $message, $email, "cris.publico.cp001@gmail.com", $cc = null, $bcc = null);
        
        echo json_encode($valid);
    }
}