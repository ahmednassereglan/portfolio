<?php

require("../db/db.php");
//filter and validate
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id=$_POST['id'];
    $name =filter_var(trim($_POST["name"]), FILTER_SANITIZE_STRING);
    $nickname =filter_var(trim($_POST["nickname"]), FILTER_SANITIZE_STRING);
    $age =$_POST["age"];
    $birthday =$_POST["birthday"];
    $college =filter_var(trim($_POST["college"]), FILTER_SANITIZE_STRING);
    $qualifice =filter_var(trim($_POST["qualifice"]), FILTER_SANITIZE_STRING);
    $address =filter_var(trim($_POST["address"]), FILTER_SANITIZE_STRING);
    $city =filter_var(trim($_POST["city"]), FILTER_SANITIZE_STRING);
    $country=filter_var(trim($_POST["country"]), FILTER_SANITIZE_STRING);
    $job=filter_var(trim($_POST["job"]), FILTER_SANITIZE_STRING);
    $social=filter_var(trim($_POST["social"]), FILTER_SANITIZE_STRING);
    $aboutme=filter_var(trim($_POST["aboutme"]), FILTER_SANITIZE_STRING);
     $fileName =$_POST['image'];

    
    
            $qry ="UPDATE user SET   `name`='$name',nickname='$nickname',age='$age',birthDate='$birthday',college='$college',qualification='$qualifice',socialStatus='$social',`img`='$fileName',job='$job',`address`='$address',`city`='$city',`country`='$country',`aboutme`='$aboutme' WHERE `id`=$id";
            $rslt = mysqli_query($conn, $qry);
        
    
        
    if(mysqli_error($conn)){

        mysqli_close($conn);
        header("location:../user.php?msg=false&color=alert-danger");
    }else{

        mysqli_close($conn);
        header("location:../user.php?msg=sucess&color=alert-success");
    }
}else{
    mysqli_close($conn);
    header("location: ../user.php?msg=false&color=alert-danger");
    
}