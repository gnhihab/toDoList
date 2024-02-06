<?php

namespace ROUTE\week12\TO_DO_LIST\classes\Validation;


require_once 'validator.php';
use ROUTE\week12\TO_DO_LIST\classes\Validation\Validator;


class Str implements Validator{

    public function check($key, $value){

        if(is_numeric($value)){

            return "$key must be string";
            
        }else{

           return false;
        }

    }
}