<?php
require_once 'inc/header.php';
require_once 'inc/connection.php';
require_once 'App.php';
?>


<?php

if($request->checkGet("id")){

    $id = $request->get("id");

    $stm = $conn->prepare("select * from todolist where id=:id");
    $stm->bindParam(":id",$id,PDO::PARAM_INT);
    $stm->execute();
    
    if($stm->rowCount()>0){

        $todo = $stm->fetch(PDO::FETCH_ASSOC);

    }else{

        $session->set("errors",["note not found"]);
        $request->header("index.php");
    }

}else{

    $session->set("errors",["note not found"]);
    $request->header("index.php");

}

?>

<body class="container w-50 mt-5">
    <?php require_once 'inc/errors.php' ?>
    <form action="handle/edit.php?id=<?php echo $id ?>" method="post">
            <textarea type="text" class="form-control"  name="title" id="" placeholder="enter your note here"><?php echo $todo['title']?></textarea>
            <div class="text-center">
                <button type="submit" name="submit" class="form-control text-white bg-info mt-3 " >Update</button>
            </div>  
    </form>
</body>
</html>