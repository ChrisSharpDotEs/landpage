<?php
namespace Service;

use Model\Conexion;
use PDO;
use PDOException;

class UserService extends Conexion{
    public function __construct(){
        parent::__construct();
    }
    public function findUserByEmail($email){
        $query = "SELECT nombre, apellido, email, date_of_creation FROM Usuarios";

        $stmt = $this->conexion->prepare($query);
        try{
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e){
            return $e -> getMessage();
        }
    }

    public function findAll(){
        $query = "SELECT nombre, apellido, email, date_of_creation FROM Usuarios";

        $stmt = $this->conexion->prepare($query);
        try{
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch(PDOException $e){
            
            return $e -> getMessage();
        
        }
    }
}