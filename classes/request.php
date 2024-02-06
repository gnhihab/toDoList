<?php

namespace ROUTE\week12\TO_DO_LIST\classes;


class Request{

    public function get($key){

        return (isset($_GET[$key])) ? $_GET[$key] : "key not correct" ;
    }

    public function checkGet($key){
        return (isset($_GET[$key])) ;
    }

    public function post($key){
        return (isset($_POST[$key])) ? $_POST[$key] : "key not correct" ;
    }


    public function checkPost($key){
        return (isset($_POST[$key])) ;
    }

    public function clean($key){

        return trim(htmlspecialchars($key));
    }

    public function checkMethod(){
        
        return $_SERVER['REQUEST_METHOD'];
    }
    
    public function header($file){

        return header("location:$file");
    }

}