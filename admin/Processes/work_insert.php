<?php

require("../db/db.php");
//filter and validate

$id=$_POST['id'];
$name=$_POST['name'];
$image=$_POST['image'];
$link=$_POST['link'];


$qry ="insert into work (name,img,link,user) values('$name','$image','$link','$id')";
$rslt = mysqli_query($conn ,$qry);
mysqli_close($conn);


if(mysqli_error($conn)){

    mysqli_close($conn);
    header("location:../work.php?msg=false&color=alert-danger");
}else{

    mysqli_close($conn);
    header("location:../work.php?msg=insert&color=alert-success");
}