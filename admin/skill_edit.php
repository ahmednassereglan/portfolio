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
    <?php $skill='active' ?>
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

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Edit Skill </h3>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <?php
                                $idskill=$_GET['idskill'];
                                $id=$_SESSION['user'];
                                try{
                                    require("db/db.php");
                                    $qry ="SELECT *  FROM skils WHERE user=$id AND id=$idskill LIMIT 1";
                                    $verify = mysqli_query($conn,$qry);
                                    while($row = mysqli_fetch_array($verify,MYSQLI_ASSOC)){
                                    
                            ?>

                            <form action="Processes/skile_edit.php" method="post" role="form">
                                <input type="hidden" name="id" value="<?php echo $_SESSION['user'] ?>">
                                <input type="hidden" name="idskill" value="<?php echo $row['id'] ?>">
                                <h6 class="heading-small text-muted mb-4">Skill information</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Name</label>
                                                <input type="text" name="name" id="input-username" class="form-control"
                                                    placeholder="Like->( CSS )" value="<?php echo $row['name'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">Rate</label>
                                                <input type="number" name="rate" id="input-email" class="form-control"
                                                    placeholder="Like->( 90 )" value="<?php echo $row['rate'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8 offset-2 ">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-first-name">Icon</label>
                                                <input type="text" name="icon" id="input-first-name"
                                                    class="form-control"
                                                    placeholder="Like->( bx bxl-html5,OR,fab fa-html5 )"
                                                    value="<?php echo $row['icon'] ?>">
                                            </div>
                                            <div class="text-center">
                                                <a href="https://boxicons.com/" style="margin-right: 50px;">Boxicons</a>
                                                <a href="https://fontawesome.com/v5.15/icons/">Font Awesome</a>
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