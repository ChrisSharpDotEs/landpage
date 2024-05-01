<?php
class EmailManager{
    public static function send($email, $subject, $message, $from = null, $to = null, $cc = null, $bcc = null){
        $cabecera = "\nFrom: $from\r\nTo: $to\r\nX-Mailer: PHP / " . phpversion();
        $result = mail($to, $subject, $message, $cabecera);

        /*if($result == true){
            echo "Correo enviado correctamente";
        } else {
            echo "El correo no se ha enviado";
        }
        echo "\n" . $message . "\n" . $cabecera;*/
        return $result;
    }
}