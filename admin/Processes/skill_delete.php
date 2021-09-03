<?php

require("../db/db.php");
//filter and validate


    $idskill=$_GET['idskill'];
    

    $qry ="DELETE FROM `skils` WHERE `id`=$idskill ";
    
    $rslt = mysqli_query($conn, $qry);

    if($mmm = mysqli_error($conn)){

        mysqli_close($conn);
        header("location:../skill.php?msg=$mmm&color=alert-danger");
    }else{

        mysqli_close($conn);
        header("location:../skill.php?msg=delete&color=alert-success");
    }