<?php

require("../db/db.php");
//filter and validate

    $name = filter_var(trim($_POST["name"]) ,FILTER_SANITIZE_STRING);
    $icon =$_POST['icon'];
    


    
    $qry ="INSERT INTO `contacttype`( `name`, `icon`) VALUES ('$name','$icon')";
    $rslt = mysqli_query($conn ,$qry);



    if($mmm = mysqli_error($conn)){

        mysqli_close($conn);
        header("location:../contact.php?msg=$mmm&color=alert-danger");
    }else{

        mysqli_close($conn);
        header("location:../contact.php?msg=sucess&color=alert-success");
    }