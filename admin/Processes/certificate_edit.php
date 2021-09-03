<?php

require("../db/db.php");
//filter and validate
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $idcertif=$_POST['idcertif'];
    $id=$_POST['id'];
    $name =filter_var(trim($_POST["named"]), FILTER_SANITIZE_STRING);
    $image =$_POST["imaged"];
    $dated =$_POST["dated"];

    if($image == ""){
        $qry ="UPDATE `certificate` SET `name`='$name',`date`='$dated' WHERE `id`=$idcertif and `user`='$id'";
    
    }else{
        $qry ="UPDATE `certificate` SET `name`='$name',`img`='$image',`date`='$dated' WHERE `id`=$idcertif and `user`='$id'";
    
    }

    
    $rslt = mysqli_query($conn, $qry);

    if($mmm = mysqli_error($conn)){

        mysqli_close($conn);
        header("location:../certificate.php?msg=$mmm&color=alert-danger");
    }else{

        mysqli_close($conn);
        header("location:../certificate.php?msg=sucess&color=alert-success");
    }
}else{
    mysqli_close($conn);
    header("location: ../certificate.php?msg=$mmm&color=alert-danger");
    
}