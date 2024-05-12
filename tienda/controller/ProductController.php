<?php
//Debemos cargar el archivo producto.php
require "../model/producto.php";


class ProductController
{
# Esta clase se encarga de manejar los datos recibidos por el archivo enrutado.php para actualizar
# el modelo.
    public function listar()
    {
        // Método para obtener todos los registros desde el modelo
        try{
            $productoModel = new ProductModel();
            
            $productos = $productoModel->getProductInfo();

            return $productos;
        } catch(Exception $e) {
            return $e;
        }
    }

    public function getProduct()
    {
        // Método para ver un producto específico desde el modelo
        try{
            $id = $_POST["id"];
            $productoModel = new ProductModel();
            
            //Se llama al método del controlador para obtener los datos
            $productos = $productoModel -> getProductInfoById($id);
            include "../view/detalle.php";
            
            //devolvemos los datos a enrutado.php
            return mostrarDetalles(
                $productos["id"], 
                $productos["nombre"],
                $productos["descripcion"],
                $productos["pvp"],
                $productos["tipo"]
            );
        } catch(Exception $e) {
            return $e;
        }
    }

    public function agregar()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Conectar a la base de datos y procesar el formulario
            $nombre = $_POST["nombre"];
            $descripcion = $_POST["descripcion"];
            $precio = floatval($_POST["pvp"]); #Se convierte el string a double.
            $tipo = $_POST["tipo"];

            try{
                $model = new ProductModel();
                $model -> createProduct($nombre, $descripcion, $precio, $tipo);
            } catch (PDOException $e){
                return $e;
            }
        } else {
            return "Ha ocurrido un error en el servidor. El método es incorrecto.";
        }
    }

    public function actualizar()
    {
        // Lógica para mostrar el formulario de edición de un producto
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Conectar a la base de datos y procesar el formulario
            $id = $_POST["id"];
            $nombre = $_POST["nombre"];
            $descripcion = $_POST["descripcion"];
            $precio = floatval($_POST["pvp"]); #Se convierte el string a double.
            $tipo = $_POST["tipo"];

            try{
                $model = new ProductModel();
                $resultado = $model -> updateProduct($id, $nombre, $descripcion, $precio, $tipo);

                if($resultado != ""){
                    header("Loaction: ./listado.php");
                    return "Se ha actualizado correctamente. " . $resultado;
                } else{
                    return "Ha ocurrido un error. " . $resultado;
                }
                
            } catch (PDOException $e){
                return $e;
            }
        } else {
            return "Ha ocurrido un error en el servidor. El método es incorrecto.";
        }
    }

    public function borrar()
    {
        if(isset($_POST["id"]) && isset($_POST["accion"])){
            # Assignamos la variable
            $id = $_POST["id"];

            # Conectamos con el modelo para gestionar la consulta a base de datos
            $producto = new ProductModel();
            
            $resultado = $producto -> deleteProduct($id);
            return $resultado;

        } else {
            return "No se ha recibido el id";
        }
    }

}
?>
