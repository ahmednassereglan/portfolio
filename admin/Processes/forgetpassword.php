<?php

require("../db/db.php");
//filter and validate
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $email =$_POST["email"];
    $question=$_POST['securityQuestion'];
    $answer=$_POST['answer'];
    $new=$_POST['newpassword'];
    

    $qry ="UPDATE `admin` SET `password`='$new' WHERE `email`='$email' AND `Question`='$question' AND `answer`='$answer'";
    
    $rslt = mysqli_query($conn, $qry);
    
    if($mmm = mysqli_error($conn)){

        mysqli_close($conn);
        header("location:../forgetpassword.php?msg=$mmm");
    }else{

        mysqli_close($conn);
        header("location:../forgetpassword.php?msg=sucess");
    }
    
}else{
    mysqli_close($conn);
    header("location: ../forgetpassword.php?msg=False");
    
}