<?php
namespace Model;

use PDO;
use PDOException;

class Conexion {
    private $host;
    private $port;
    private $db;
    private $user;
    private $password;
    private $dsn;
    protected $conexion;

    public function __construct(){
        $this -> host = "localhost";
        $this -> port = "3306";
        $this -> db = "testdb";
        $this -> user = "root";
        $this -> password = "password";
        $this -> dsn = "mysql:host={$this -> host}; port={$this-> port}; dbname={$this -> db}; charset=utf8mb4";
        $this -> conexion = $this -> connect();
    }

    public function connect(){
        $conexion = new PDO($this -> dsn, $this -> user, $this -> password);
        $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
    }

    public function close(){
        $this -> conexion = null;
    }

}