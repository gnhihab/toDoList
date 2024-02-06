<?php

namespace ROUTE\week12\TO_DO_LIST\classes\Validation;


require_once 'validator.php';
use ROUTE\week12\TO_DO_LIST\classes\Validation\Validator;


class Required implements Validator{

    public function check($key, $value){

        if(empty($value)){

            return "$key is required";
            
        }else{

            return false;
            
        }

    }
    
}