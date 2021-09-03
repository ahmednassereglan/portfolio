<?php

require("../db/db.php");
//filter and validate


    $idcertif=$_GET['idcertif'];
    

    $qry ="DELETE FROM `certificate` WHERE `id`=$idcertif ";
    
    $rslt = mysqli_query($conn, $qry);

    if($mmm = mysqli_error($conn)){

        mysqli_close($conn);
        header("location:../certificate.php?msg=$mmm&color=alert-danger");
    }else{

        mysqli_close($conn);
        header("location:../certificate.php?msg=delete&color=alert-success");
    }