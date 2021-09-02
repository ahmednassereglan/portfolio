<?php

require("../db/db.php");
//filter and validate


    
    $idd = $_POST['idd'];
    $named = filter_var(trim($_POST["named"]) ,FILTER_SANITIZE_STRING);
    $imaged =$_POST['imaged'];
    $dated = $_POST['dated'];


    
    $qry ="INSERT INTO `certificate`( `name`, `date`, `img`, `user`) VALUES ('$named','$dated','$imaged',$idd)";
    $rslt = mysqli_query($conn ,$qry);



    if($mmm = mysqli_error($conn)){

        mysqli_close($conn);
        header("location:../certificate.php?msg=$mmm&color=alert-danger");
    }else{

        mysqli_close($conn);
        header("location:../certificate.php?msg=sucess&color=alert-success");
    }