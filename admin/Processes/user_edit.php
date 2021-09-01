<?php

require("../db/db.php");
//filter and validate
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id=$_POST['id'];
    $nickname =filter_var(trim($_POST["nickname"]) ,FILTER_SANITIZE_STRING);
    $age =$_POST["age"];
    $birthday =$_POST["birthday"];
    $college =filter_var(trim($_POST["college"]) ,FILTER_SANITIZE_STRING);
    $qualifice =filter_var(trim($_POST["qualifice"]) ,FILTER_SANITIZE_STRING);
    $address =filter_var(trim($_POST["address"]) ,FILTER_SANITIZE_STRING);
    $city =filter_var(trim($_POST["city"]) ,FILTER_SANITIZE_STRING);
    $country=filter_var(trim($_POST["country"]) ,FILTER_SANITIZE_STRING);
    $job=filter_var(trim($_POST["job"]) ,FILTER_SANITIZE_STRING);
    $social=filter_var(trim($_POST["social"]) ,FILTER_SANITIZE_STRING);
    $aboutme=filter_var(trim($_POST["aboutme"]) ,FILTER_SANITIZE_STRING);


    $qry ="insert into user (id ,name) values('$id','$name')";
    $rslt = mysqli_query($conn ,$qry);
    mysqli_close($conn);

    require("../db/db.php");
    $qryy ="insert into admin (name ,email ,password,Question,answer,user) values('$name','$email','$password','$question','$answer','$id')";
    $rsltt = mysqli_query($conn ,$qryy);


    if(mysqli_error($conn)){

        mysqli_close($conn);
        header("location:../register.php?msg=false");
    }else{

        mysqli_close($conn);
        header("location:../register.php?msg=sucess");
    }
}else{
    mysqli_close($conn);
    header("location: ../login.php?msg=false");
    
}