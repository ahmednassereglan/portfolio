<?php

require("../db/db.php");
//filter and validate
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $idcont=$_POST['idcont'];
    $id=$_POST['id'];
    $name =filter_var(trim($_POST["name"]), FILTER_SANITIZE_STRING);
    $type =$_POST["type"];
    

    
    $qry ="UPDATE `contact` SET `content`='$name',`type`='$type' WHERE `id`=$idcont and `user`='$id'";
    
    

    
    $rslt = mysqli_query($conn, $qry);

    if($mmm = mysqli_error($conn)){

        mysqli_close($conn);
        header("location:../contact.php?msg=$mmm&color=alert-danger");
    }else{

        mysqli_close($conn);
        header("location:../contact.php?msg=sucess&color=alert-success");
    }
}else{
    mysqli_close($conn);
    header("location: ../contact.php?msg=$mmm&color=alert-danger");
    
}