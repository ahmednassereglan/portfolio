<?php

require("../db/db.php");
//filter and validate

$id=$_POST['id'];
$name =filter_var(trim($_POST["name"]) ,FILTER_SANITIZE_STRING);
$email =filter_var(trim($_POST["email"]) ,FILTER_SANITIZE_EMAIL);
$password =filter_var(trim($_POST["password"]) ,FILTER_SANITIZE_EMAIL);
$question=$_POST['securityQuestion'];
$answer=$_POST['answer'];


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