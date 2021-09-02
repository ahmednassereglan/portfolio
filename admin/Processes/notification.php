<?php

require("../db/db.php");
$idemail=$_GET['idemail'];


$qry ="UPDATE `contactwithme` SET `status`=1  WHERE `id`=$idemail";
$rslt = mysqli_query($conn, $qry);


if(mysqli_error($conn)){

    mysqli_close($conn);
    header("location:../contactwithme.php?msg=notseen");
}else{

    mysqli_close($conn);
    header("location:../contactwithme.php?msg=seen");
}