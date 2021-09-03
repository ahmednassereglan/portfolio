<?php

require("../db/db.php");
//filter and validate
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $idwork=$_POST['idwork'];
    $id=$_POST['id'];
    $name =filter_var(trim($_POST["name"]), FILTER_SANITIZE_STRING);
    $image =$_POST["image"];
    $link =$_POST["link"];

    $qry ="UPDATE `work` SET `name`='$name',`img`='$image',`link`='$link' WHERE `id`=$idwork and `user`='$id'";
    
    $rslt = mysqli_query($conn, $qry);

    if($mmm = mysqli_error($conn)){

        mysqli_close($conn);
        header("location:../work.php?msg=$mmm&color=alert-danger");
    }else{

        mysqli_close($conn);
        header("location:../work.php?msg=sucess&color=alert-success");
    }
}else{
    mysqli_close($conn);
    header("location: ../work.php?msg=$mmm&color=alert-danger");
    
}