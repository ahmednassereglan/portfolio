<?php

require("../db/db.php");
//filter and validate

$id=$_POST['id'];
$name=$_POST['name'];
$rate=$_POST['rate'];
$icon=$_POST['icon'];

$qry ="insert into skils (name,rate,icon,user) values('$name','$rate','$icon','$id')";
$rslt = mysqli_query($conn ,$qry);
mysqli_close($conn);


if($mmm = mysqli_error($conn)){

    mysqli_close($conn);
    header("location:../skill.php?msg=$mmm&color=alert-danger");
}else{

    mysqli_close($conn);
    header("location:../skill.php?msg=insert&color=alert-success");
}