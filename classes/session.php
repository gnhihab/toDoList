<?php

namespace ROUTE\week12\TO_DO_LIST\classes;


class Session{

    public function __construct()
    {
        session_start();
    }
    
    public function set($key,$value){

        $_SESSION[$key]=$value;

    }

    public function get($key){

        return (isset($_SESSION[$key])) ? $_SESSION[$key]: null;

        // echo $_SESSION[$key];

    }

    public function remove($key){

        unset( $_SESSION[$key]);

    }

    public function destroy(){

        session_destroy();
    }

    public function check($key){
        
        return isset($_SESSION[$key]);
    }
}