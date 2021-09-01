<?php

session_start();
require("../db/db.php");

if(isset($_SESSION['admin'])) {
    header("location: ../admin.php");
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
		
    
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        if($email != "" && $password != "") {
            
            $qry ="SELECT * FROM admin WHERE email='$email' and password='$password' LIMIT 1";

            $verify = mysqli_query($conn,$qry);

                $row = mysqli_fetch_assoc($verify);
                
                $_SESSION['admin'] = $row['email'];
                $_SESSION['user'] = $row['user'];
                $_SESSION['name'] = $row['name'];

                mysqli_close($conn);
                    header("location: ../admin.php");
                
            
        }else{
            mysqli_close($conn);
            header("location: ../login.php?msg=false");
            
        }
        
    
    
}else{
    mysqli_close($conn);
    header("location: ../login.php?msg=falseee");
    
}