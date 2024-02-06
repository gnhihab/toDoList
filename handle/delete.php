<?php

require_once '../inc/connection.php';
require_once '../App.php';

if($request->checkGet("id")){

    $id = $request->get("id");

        $stm = $conn->prepare("select id from `todolist` where id=:id");
        $stm->bindParam(":id",$id,PDO::PARAM_INT);
        $stm->execute();

        if($stm->rowCount()==1){

            $stm = $conn->prepare("delete from todolist where id=:id");
            $stm->bindParam(":id",$id,PDO::PARAM_INT);
            $output = $stm->execute();

            if($output){

                $session->set("success","note deleted successfuly");
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