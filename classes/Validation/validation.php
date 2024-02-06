<?php

namespace ROUTE\week12\TO_DO_LIST\classes\Validation;

require_once 'required.php';
require_once 'str.php';


class Validation{

    private $errors=[];

    public function validate($key,$value,$rules){

        foreach($rules as $rule){

            $rule = "ROUTE\week12\TO_DO_LIST\classes\Validation\\".$rule;
            $object = new $rule;

            $error = $object->check($key,$value);

            if($error != false){

                $this->errors[] = $error;
            }
        }
    }

    public function getError(){

        return $this->errors;
    }

}