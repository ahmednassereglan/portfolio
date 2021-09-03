<?php

require("../db/db.php");
//filter and validate

    $id = $_POST['id'];
    $name = filter_var(trim($_POST["name"]) ,FILTER_SANITIZE_STRING);
    $type =$_POST['type'];
    


    
    $qry ="INSERT INTO `contact`( `content`,`type`,`user`) VALUES ('$name',$type,$id)";
    $rslt = mysqli_query($conn ,$qry);



    if($mmm = mysqli_error($conn)){

        mysqli_close($conn);
        header("location:../contact.php?msg=$mmm&color=alert-danger");
    }else{

        mysqli_close($conn);
        header("location:../contact.php?msg=insert&color=alert-success");
    }