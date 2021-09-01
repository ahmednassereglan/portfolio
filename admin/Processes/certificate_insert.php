<?php

require("../db/db.php");
//filter and validate

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $id = $_POST['id'];
    $name = $_POST['name'];
    $image =$_POST['image'];
    $date = $_POST['datecer'];


    $qry ="INSERT INTO certificate ( name , date, img , user) VALUES ('$name','$date','$image',$id)";
    $rslt = mysqli_query($conn ,$qry);
    mysqli_close($conn);


    if(mysqli_error($conn)){

        mysqli_close($conn);
        header("location:../certificate.php?msg=false&color=alert-danger");
    }else{

        mysqli_close($conn);
        header("location:../certificate.php?msg=sucess&color=alert-success");
    }
}else{
    mysqli_close($conn);
    header("location: ../login.php?msg=false&color=alert-danger");
    
}