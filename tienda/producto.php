<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class ProductModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = new PDO(
            "mysql:host=localhost;dbname=EMPRESA",
            "username",
            "1234"
        );
    }

    private function exists($id)
    {
        // Verificar si el producto con el ID proporcionado existe en la base de datos
        try {
            $sql = "SELECT * FROM productos WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $producto = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$producto) {
                // El producto no existe, devuelve false
                return false;
            } else {
                return true;
            }
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
        //no se debe finalizar la conexión aqui
    }

    public function getProductInfo()
    {
        //Devuelve todos los productos
        // Consulta SQL
        $sql = "SELECT id, nombre, descripcion, pvp, tipo FROM productos";

        // Se prepara y se ejecuta la consulta:
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        // Para poder mostrar los resultados, es mejor usar un array asociativo: 
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $this->conn = NULL;
        return $resultados;

    }

    public function getProductInfoById($id)
    {
        try{
            // Consulta SQL
            $sql = "SELECT `id`, `nombre`, `descripcion`, `pvp`, `tipo` FROM `productos` WHERE id = :id";

            // Se prepara y se ejecuta la consulta:
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $resultados = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->conn = NULL;
            return $resultados;
        } catch(PDOException $e){
            return $e;
        }
       

    }

    public function createProduct($nombre, $descripcion, $precio, $tipo)
    {
        try {
            // Creamos la consulta SQL
            $sql = "INSERT INTO `productos`(`nombre`, `descripcion`, `pvp`, `tipo`) VALUES  (:nombre, :descripcion, :precio, :tipo)";
            $stmt = $this->conn->prepare($sql);

            // Vincular valores a los marcadores de posición
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':precio', $precio);
            $stmt->bindParam(':tipo', $tipo);

            // Ejecutar la consulta para agregar el producto
            if ($stmt->execute()) {
                return "Se ha añadido un nuevo producto exitosamente.";
            } else {
                return "Ha ocurrido un error al ejecutar la sentencia sql.";
            }
        } catch (PDOException $e) {
            echo $e;
        } finally {
            $this->conn = NULL;
            //aquí finalizamos la conexión porque no se realizará más operaciones
        }
    }

    public function updateProduct($id, $nombre, $descripcion, $precio, $tipo)
    {
        try {
            if ($this->exists($id)) {
                // Realizar la actualización en la base de datos
                $actualizardatos = [
                    'nombre' => $nombre,
                    'descripcion' => $descripcion,
                    'pvp' => $precio,
                    'tipo' => $tipo
                ];

                foreach ($actualizardatos as $key => $value) {
                    echo $key;
                    echo $value;
                    if (!empty($value)) {
                        $this->updateField($id, $key, $value);
                    }
                }
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            return $e;
        } finally {
            $this->conn = NULL;
            //aquí finalizamos la conexión porque no se realizará más operaciones

        }

    }

    public function deleteProduct($id){
        if($this->exists($id)) {
            try {
                // Creamos la consulta SQL
                $sql = "DELETE FROM `productos` WHERE `id` = :id";
                $stmt = $this->conn->prepare($sql);
    
                // Vincular valores a los marcadores de posición
                $stmt->bindParam(':id', $id);
    
                // Ejecutar la consulta para agregar el producto
                if ($stmt->execute()) {
                    return TRUE;
                } else {
                    return FALSE;
                }
            } catch (PDOException $e) {
                //En caso de error lo mostramos y devolvemos false.
                echo $e;
                return FALSE;
            } finally {
                $this->conn = NULL;
                //aquí finalizamos la conexión porque no se realizará más operaciones
            }
        }
    }

    private function updateField($id, $campo, $valor)
    {
        $sql = "UPDATE `productos` SET `$campo` = :valor WHERE `id` = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':valor', $valor, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return true;
        } else {
            echo "La sentencia no se ejecutó correctamente. Error: " . implode(" - ", $stmt->errorInfo());
        }
    }
}

?>