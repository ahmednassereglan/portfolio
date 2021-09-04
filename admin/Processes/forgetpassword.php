<?php

require("../db/db.php");
//filter and validate
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $email =$_POST["email"];
    $question=$_POST['securityQuestion'];
    $answer=$_POST['answer'];
    $new=$_POST['newpassword'];
    $confirm=$_POST['confirmpassword'];
    

    if ($_POST['newpassword'] !== $_POST['confirmpassword']) {
        
        mysqli_close($conn);
        $mss='Password and Confirm password should match!';
        header("location:../forgetpassword.php?msg=$mss");  
     }else{
        $qry ="UPDATE `admin` SET `password`='$new' WHERE `email`='$email' AND `Question`='$question' AND `answer`='$answer'";
    
        $rslt = mysqli_query($conn, $qry);
    
        if(mysqli_num_rows($rslt) <= 0){
    
            mysqli_close($conn);
            $mss='There Is An Error In The Email Or Question !';
            header("location:../forgetpassword.php?msg=$mss");
            
        }else{
            mysqli_close($conn);
            header("location:../login.php?msg=Password Changed");
        }

     }
    
}else{
    mysqli_close($conn);
    header("location: ../forgetpassword.php?msg=False");
    
}