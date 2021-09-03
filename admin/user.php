<?php
session_start();

require "db/db.php";
if(!isset($_SESSION['admin']) && !isset($_SESSION['user'])) {
    header("location: logout.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Material Dashboard by Creative Tim
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />

    <!--     Fonts and icons     -->
    <?php require "layouts/cssfile.php"; ?>
</head>

<body>

    <!-- Sidenav -->
    <?php $user='active' ?>
    <?php require "layouts/slider.php"; ?>

    <div class="main-content" id="panel">
        <!-- Topnav -->
        <?php $background='bg-default' ?>
        <?php require "layouts/header.php"; ?>
        <!-- Header -->

        <div class="header pb-6 d-flex align-items-center"
            style="min-height: 500px; background-image: url(../assets/img/<?php echo $_SESSION['userImg'] ?>); background-size: cover; background-position: center top;">

            <!-- Mask -->
            <span class="mask bg-gradient-default opacity-8"></span>
            <!-- Header container -->

            <div class="container-fluid  align-items-center">
                <div class="row">
                    <?php
                                        if (isset($_GET['msg'])) {
                                            $msg=$_GET['msg'];
                                            $color=$_GET['color'];

                                            if ($msg == 'sucess') {
                                                $msg= 'Update Sucess';

                                            } elseif($msg == 'delete'){

                                                $msg= 'delete Sucess';
                                            }elseif($msg == 'insert'){

                                                $msg= 'insert Sucess';
                                            } ?>
                    <div class="col-8 offset-2">
                        <div class="alert <?php echo $color ?> alert-dismissible fade show" role="alert">
                            <strong><?php echo $msg ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <?php
                                        }
                    ?>
                </div>
                <div class="row">
                    <div class="col-lg-7 col-md-10">
                        <h1 class="display-2 text-white">Hello <?php echo $_SESSION['name'] ?></h1>
                        <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've
                            made with your work and manage your projects or assigned tasks</p>

                    </div>
                </div>
            </div>
        </div>

        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-xl-4 order-xl-2">
                    <div class="card card-profile">
                        <img src="../assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    <a href="#">
                                        <img src="../assets/img/<?php echo $_SESSION['userImg'] ?>"
                                            class="rounded-circle">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                            <div class="d-flex justify-content-between">
                                <a href="work.php" class="btn btn-sm btn-info  mr-4 ">Work</a>
                                <a href="skill.php" class="btn btn-sm btn-default float-right">Skill</a>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col">
                                    <div class="card-profile-stats d-flex justify-content-center">
                                        <div>
                                            <?php
                                        try{
                                            $id=$_SESSION['user'];
                                            require("db/db.php");
                                            $qrywork ="SELECT COUNT(id)AS workconter FROM `work`  WHERE user=$id  ";
                                            $verifywork = mysqli_query($conn,$qrywork);
                                            $rowwork = mysqli_fetch_assoc($verifywork);
                                            mysqli_close($conn);
                                        }
                                        catch(Exception $e){
                                            'Caught exception: '.  $e->getMessage(). "\n";
                                        }
                                        ?>
                                            <span class="heading"><?php echo $rowwork['workconter'] ?></span>
                                            <span class="description">Works</span>
                                        </div>
                                        <div>
                                            <?php
                                        try{
                                            $id=$_SESSION['user'];
                                            require("db/db.php");
                                            $qryskill ="SELECT COUNT(id)AS skillconter FROM `skils`  WHERE user=$id  ";
                                            $verifyskill = mysqli_query($conn,$qryskill);
                                            $rowskill = mysqli_fetch_assoc($verifyskill);
                                            mysqli_close($conn);
                                        }
                                        catch(Exception $e){
                                            'Caught exception: '.  $e->getMessage(). "\n";
                                        }
                                        ?>
                                            <span class="heading"><?php echo $rowskill['skillconter'] ?></span>
                                            <span class="description">Skills</span>
                                        </div>
                                        <div>
                                            <?php
                                        try{
                                            $id=$_SESSION['user'];
                                            require("db/db.php");
                                            $qrycertif ="SELECT COUNT(id)AS certifconter FROM `certificate`  WHERE user=$id  ";
                                            $verifycertif = mysqli_query($conn,$qrycertif);
                                            $rowcertif = mysqli_fetch_assoc($verifycertif);
                                            mysqli_close($conn);
                                        }
                                        catch(Exception $e){
                                            'Caught exception: '.  $e->getMessage(). "\n";
                                        }
                                        ?>
                                            <span class="heading"><?php echo $rowcertif['certifconter'] ?></span>
                                            <span class="description">Certificates</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <?php
                                        try{
                                            $id=$_SESSION['user'];
                                            require("db/db.php");
                                            $qryuser ="SELECT *  FROM user WHERE id=$id LIMIT 1";
                                            $verifyuser = mysqli_query($conn,$qryuser);
                                            $rowuser = mysqli_fetch_assoc($verifyuser);
                                            mysqli_close($conn);
                                        }
                                        catch(Exception $e){
                                            'Caught exception: '.  $e->getMessage(). "\n";
                                        }
                                        ?>
                                <h5 class="h3">
                                    <?php echo $rowuser['name'] ?><span class="font-weight-light"> ,
                                        <?php echo $rowuser['age'] ?></span>
                                </h5>
                                <div class="h5 font-weight-300">
                                    <i class="ni location_pin mr-2"></i><?php echo $rowuser['country'] ?> -
                                    <?php echo $rowuser['city'] ?> - <?php echo $rowuser['address'] ?>
                                </div>
                                <div class="h5 mt-4">
                                    <i class="ni business_briefcase-24 mr-2"></i><?php echo $rowuser['job'] ?>
                                </div>
                                <div>
                                    <i class="ni education_hat mr-2"></i><?php echo $rowuser['qualification'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 order-xl-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Edit profile </h3>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <?php
                                $id=$_SESSION['user'];
                                try{
                                    require("db/db.php");
                                    $qry ="SELECT *  FROM user WHERE id=$id LIMIT 1";
                                    $verify = mysqli_query($conn,$qry);
                                    while($row = mysqli_fetch_array($verify,MYSQLI_ASSOC)){
                                    
                            ?>

                            <form action="Processes/user_edit.php" method="post" role="form">
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                <h6 class="heading-small text-muted mb-4">User information</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Full Name</label>
                                                <input type="text" id="input-username" class="form-control"
                                                    placeholder="Your Full Name" name="name"
                                                    value="<?php echo $row['name'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">Nick Name</label>
                                                <input type="text" id="input-email" class="form-control"
                                                    placeholder="Your Nick Name" name="nickname"
                                                    value="<?php echo $row['nickname'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-first-name">Age</label>
                                                <input type="number" id="input-first-name" class="form-control"
                                                    placeholder="Your Age" name="age" value="<?php echo $row['age'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-last-name">Birth
                                                    Day</label>
                                                <input type="date" id="input-last-name" class="form-control"
                                                    placeholder="Your Birth Day" value="<?php echo $row['birthDate'] ?>"
                                                    name="birthday">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4" />

                                <!-- Address -->
                                <h6 class="heading-small text-muted mb-4">University information</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-address">College</label>
                                                <input id="input-address" class="form-control"
                                                    placeholder="Your College" name="college"
                                                    value="<?php echo $row['college'] ?>" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label"
                                                    for="input-address">Qualification</label>
                                                <input id="input-address" class="form-control"
                                                    placeholder="your Qualification" name="qualifice"
                                                    value="<?php echo $row['qualification'] ?>" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4" />
                                <!-- Address -->
                                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-address">Address</label>
                                                <input id="input-address" class="form-control"
                                                    placeholder="Home Address" name="address"
                                                    value="<?php echo $row['address'] ?>" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-city">City</label>
                                                <input type="text" id="input-city" class="form-control"
                                                    placeholder="City" name="city" value="<?php echo $row['city'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Country</label>
                                                <input type="text" id="input-country" class="form-control"
                                                    placeholder="Country" name="country"
                                                    value="<?php echo $row['country'] ?>">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <hr class="my-4" />
                                <!-- Address -->
                                <h6 class="heading-small text-muted mb-4">Other information</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-address">Job</label>
                                                <input id="input-address" name="job" class="form-control"
                                                    placeholder="Your Job" value="<?php echo $row['job'] ?>"
                                                    type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-city">Social Status</label>
                                                <select name="social" class="form-control" required>
                                                    <option value="Not Married">Not Married</option>
                                                    <option value="Married">Married</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Img</label>
                                                <input type="file" name="image" id="input-country" class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <hr class="my-4" />
                                <!-- Description -->
                                <h6 class="heading-small text-muted mb-4">About me</h6>
                                <div class="pl-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">About Me</label>
                                        <textarea rows="4" class="form-control" placeholder="A few words about you ..."
                                            name="aboutme"><?php echo $row['aboutme'] ?></textarea>
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-primary" value="Edit profile">
                            </form>
                            <?php  
                                }
                                mysqli_close($conn);
                                }
                                catch(Exception $e){
                                    'Caught exception: '.  $e->getMessage(). "\n";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <?php require "layouts/footer.php"; ?>
        </div>
    </div>
    <!--   Core JS Files   -->
    <?php require "layouts/jsfile.php"; ?>
</body>

</html>