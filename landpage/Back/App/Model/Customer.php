<?php
namespace Model;

use Model\Conexion;

use PDO;
use PDOException;

class Customer extends Conexion{
    

    public function __construct(){
        parent::__construct();
    }

    /*Métodos admitidos para el acceso a base de datos*/
    public function findCustomerByEmail($email){
        $query = "SELECT nombre, apellido, email, date_of_creation FROM Customer";

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
     * Devuelve toda la lista de clientes.
     */
    public function findAll(){
        $query = "CALL obtener_clientes();";

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

    /**
     * Devuelve toda la lista de clientes en función del comercial.
     */
    public function findAllByComercial($id){
        $query = "CALL obtener_clientes_comercial($id);";

        $stmt = $this->conexion->prepare($query);
        
        try{
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e){
            echo $e -> getMessage();
            return null;
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