<?php
namespace Controller;

class TestController
{
    public function __construct()
    {
    }

    public function test()
    {
        // Definir el contenido de la respuesta
        $contenido = "¡Hola mundo desde PHP!";

        // Clave secreta para la encriptación
        $clave = "1234";

        // Encriptar el contenido utilizando AES (Advanced Encryption Standard)
        $contenido_encriptado = openssl_encrypt($contenido, 'AES-256-CBC', $clave, 0, '1234');

        // Configurar las cabeceras para indicar que la respuesta está encriptada
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="respuesta_encriptada.txt"');

        // Enviar la respuesta encriptada al cliente
        echo $contenido;
        echo $contenido_encriptado;

    }
}