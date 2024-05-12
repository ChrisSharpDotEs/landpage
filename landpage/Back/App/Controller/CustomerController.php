<?php
namespace Controller;

use Model\Customer;

class CustomerController {
    public function __construct(){}

    public function getCustomersByComercial($id){
        $customer = new Customer();

        $result = $customer -> findAllByComercial($id);
        
        echo json_encode($result);
    }

    public function getCitas(){
        
    }
}