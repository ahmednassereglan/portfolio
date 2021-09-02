<?php

require("../admin/db/db.php");
//filter and validate

    $id = $_POST['id'];
    $name = filter_var(trim($_POST["name"]) ,FILTER_SANITIZE_STRING);
    $email =filter_var(trim($_POST["email"]) ,FILTER_SANITIZE_EMAIL);
    $content = filter_var(trim($_POST["content"]) ,FILTER_SANITIZE_STRING);
    
    $qry ="INSERT INTO `contactwithme`( `name`,`email`,`content`,`user`) VALUES ('$name','$email','$content',$id)";
    $rslt = mysqli_query($conn ,$qry);



    if($mmm = mysqli_error($conn)){

        mysqli_close($conn);
        header("location:../index.php?msg=$mmm");
    }else{

        mysqli_close($conn);
        header("location:../index.php?msg=sucess");
    }