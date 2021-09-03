<?php

require("../db/db.php");
//filter and validate


    $idwork=$_GET['idwork'];
    

    $qry ="DELETE FROM `work` WHERE `id`=$idwork ";
    
    $rslt = mysqli_query($conn, $qry);

    if($mmm = mysqli_error($conn)){

        mysqli_close($conn);
        header("location:../work.php?msg=$mmm&color=alert-danger");
    }else{

        mysqli_close($conn);
        header("location:../work.php?msg=delete&color=alert-success");
    }