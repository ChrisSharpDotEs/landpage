<?php
namespace Controller;

use Model\Comercial;

class ComercialController{

    public function __construct(){}

    public function findAll(){
        $comercial = new Comercial();

        $result = $comercial->findAll();
        
        echo json_encode($result);
    }

    public function create($username, $useremail, $userpass){
       
    }
    
}