<?php

require_once '../inc/connection.php';
require_once '../App.php';

if($request->checkGet("id") && $request->checkPost("submit")){

    $id = $request->get("id");
    $title = $request->clean($request->post("title"));

    $validation->validate("title",$title,['required','str']);
    $errors = $validation->getError();

    if(empty($errors)){

        $stm = $conn->prepare("select id from `todolist` where id=:id");
        $stm->bindParam(":id",$id,PDO::PARAM_INT);
        $stm->execute();

        if($stm->rowCount()==1){

            $stm = $conn->prepare("update todolist set `title`=:title where id=:id");
            $stm->bindParam(":title",$title,PDO::PARAM_STR);
            $stm->bindParam(":id",$id,PDO::PARAM_INT);
            $output = $stm->execute();

            if($output){

                $session->set("success","note updated successfuly");
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
        $session->set("errors",$errors);
        $request->header("../edit.php?id=$id");
    }

}else{

    $request->header("../index.php");
}