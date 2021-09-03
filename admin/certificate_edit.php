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
    <?php $certificate='active' ?>
    <?php require "layouts/slider.php"; ?>

    <div class="main-content" id="panel">
        <!-- Topnav -->
        <?php $background='bg-primary' ?>
        <?php require "layouts/header.php"; ?>
        <!-- Header -->
        <!-- Header -->
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Default</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">
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
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Edit Certificate </h3>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <?php
                                $idcertif=$_GET['idcertif'];
                                $id=$_SESSION['user'];
                                try{
                                    require("db/db.php");
                                    $qry ="SELECT *  FROM `certificate` WHERE user=$id AND id=$idcertif LIMIT 1";
                                    $verify = mysqli_query($conn,$qry);
                                    while($row = mysqli_fetch_array($verify,MYSQLI_ASSOC)){
                                    
                            ?>
                            <form action="Processes/certificate_edit.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $_SESSION['user'] ?>">
                                <input type="hidden" name="idcertif" value="<?php echo $row['id'] ?>">
                                <h6 class="heading-small text-muted mb-4">Certificate information</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label"
                                                    for="input-Certificate">Certificate</label>
                                                <input type="text" name="named" id="input-Certificate"
                                                    class="form-control" placeholder="Enter Name Of Certificate"
                                                    value="<?php echo $row['name'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-image">Img</label>
                                                <input type="file" name="imaged" id="input-image" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8 offset-2 ">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-datecer">date</label>
                                                <input type="date" name="dated" id="input-datecer" class="form-control"
                                                    value="<?php echo $row['date'] ?>">
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary" value="edit">
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