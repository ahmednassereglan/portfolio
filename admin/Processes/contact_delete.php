<?php

require("../db/db.php");
//filter and validate


    $idcont=$_GET['idcont'];
    

    $qry ="DELETE FROM `contact` WHERE `id`=$idcont ";
    
    $rslt = mysqli_query($conn, $qry);

    if($mmm = mysqli_error($conn)){

        mysqli_close($conn);
        header("location:../contact.php?msg=$mmm&color=alert-danger");
    }else{

        mysqli_close($conn);
        header("location:../contact.php?msg=delete&color=alert-success");
    }