<?php

require("../db/db.php");
//filter and validate
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idskill=$_POST['idskill'];
    $id=$_POST['id'];
    $name =filter_var(trim($_POST["name"]), FILTER_SANITIZE_STRING);
    $rate =$_POST["rate"];
    $icon =$_POST["icon"];

    $qry ="UPDATE `skils` SET `name`='$name',`rate`='$rate',`icon`='$icon' WHERE `id`=$idskill and `user`='$id'";
    
    $rslt = mysqli_query($conn, $qry);

    if(mysqli_error($conn)){

        mysqli_close($conn);
        header("location:../skill.php?msg=false&color=alert-danger");
    }else{

        mysqli_close($conn);
        header("location:../skill.php?msg=sucess&color=alert-success");
    }
}else{
    mysqli_close($conn);
    header("location: ../skill.php?msg=false&color=alert-danger");
    
}