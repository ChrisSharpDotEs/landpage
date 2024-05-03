<?php
namespace Model;

use Model\Conexion;

use PDO;
use PDOException;

class User extends Conexion{
    

    public function __construct(){
        parent::__construct();
    }

    /*Métodos admitidos para el acceso a base de datos*/
    public function findUserByEmail($email){
        $query = "SELECT nombre, apellido, email, date_of_creation FROM Usuarios";

        $stmt = $this->conexion->prepare($query);
        try{
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e){
            return $e -> getMessage();
        } finally{
            $this -> conexion = null;
        }
    }

    /**
     * Llama al procedimiento obtener_clientes_comercial, predefinido en la base de datos.
     */
    public function findAll($id){
        $query = "CALL obtener_clientes_comercial();";

        $stmt = $this->conexion->prepare($query);
        try{
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e){
            return $e -> getMessage();
        } finally{
            $this -> conexion = null;
        }
    }

    public function obtenerCitas(){
        $query = "CALL obtener_citas();";

        $stmt = $this->conexion->prepare($query);
        try{
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e){
            return $e -> getMessage();
        } finally{
            $this -> conexion = null;
        }
    }

    public function create($username, $useremail, $userpass){
        $query = "INSERT INTO Usuarios VALUES (:username, :useremail, :userpass)";

        $stmt = $this->conexion->prepare($query);

        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':useremail', $useremail, PDO::PARAM_STR);
        $stmt->bindParam(':userpass', $userpass, PDO::PARAM_STR);

        try{
            $stmt->execute();
            return true;
        } catch(PDOException){
            return false;
        } finally{
            $this -> conexion = null;
        }
    }

}