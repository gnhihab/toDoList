<?php

require_once '../inc/connection.php';
require_once '../App.php';

if($request->checkGet("id") && $request->checkGet("name")){

    $id = $request->get("id");
    $name = $request->get("name");


    $stm = $conn->prepare("select id from `todolist` where id=:id");
    $stm->bindParam(":id",$id,PDO::PARAM_INT);
    $stm->execute();

    if($stm->rowCount()==1){

        $stm = $conn->prepare("update todolist set `status`=:status where id=:id");
        $stm->bindParam(":status",$name,PDO::PARAM_STR);
        $stm->bindParam(":id",$id,PDO::PARAM_INT);
        $output = $stm->execute();

        if($output){

            $session->set("success","status updated successfuly");
            $request->header("../index.php");

        }else{

            $session->set("errors",["error"]);
            $request->header("../index.php");

        }
    }else{

        $session->set("errors",["not found"]);
        $request->header("../index.php");

    }
}else{
    
    $request->header("../index.php");
}

