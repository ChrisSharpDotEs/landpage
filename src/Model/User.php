<?php
namespace Model;

class User {
    private $id;
    private string $nombre;
    private string $apellido;
    private string $telefono;
    private $date_of_creation;
    private $age;

    public function __construct(){
        
    }

    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getDate(){
        return $this->date_of_creation;
    }
    public function getAge(){
        return $this->age;
    }

}