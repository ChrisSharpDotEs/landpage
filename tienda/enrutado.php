<?php
include "../controller/productcontroller.php";

//Manejamos la información oculta en el formulario si es crear, actualizar o eliminar.
try {
    if (isset($_POST['controlador']) && isset($_POST['accion'])) {
        //la siguiente variable realmente no es necesario, pero si el proyecto aumenta este paso será importante
        $controlador = $_POST['controlador'];
        $accion = $_POST['accion'];
    
        //Creamos el objeto de ProductController
        $controlador = new ProductController();
        $resultado = $controlador -> $accion();
        print $resultado;
    
    } else {
        // Acción por defecto
        $accion = 'listar';
        $controlador = new ProductController();
        $data = $controlador->$accion();
    }
} catch(Error $e) {
    print $e -> getMessage();
} catch(Exception $e){
    print $e -> getMessage();
}
?>
