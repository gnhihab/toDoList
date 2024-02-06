<?php

require_once '../inc/connection.php';
require_once '../App.php';
require_once '../classes/Validation/validation.php';

if($request->checkPost("submit")){

    $title = $request->clean($request->post("title"));
    // echo $title;

    $validation->validate("title",$title,["required" , "str"]);
    $errors = $validation->getError();
    // var_dump($errors);

    if(empty($errors)){

        $stm = $conn->prepare("insert into todolist (`title`) values(:title)");
        $stm->bindParam(":title",$title,PDO::PARAM_STR);
        $output = $stm->execute();
    
        if($output){
    
            $session->set("success","data inserted successfuly");
            $request->header("../index.php");
        
        }else{
    
            $session->set("errors",["error"]);
            $request->header("../index.php");
    
        }

    }else{

        $session->set("errors",$errors);
        $request->header("../index.php");
        
    }

}else{

    $request->header("../index.php");
    
}

?>