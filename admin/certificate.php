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
                                    <h3 class="mb-0">Add Certificate </h3>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">

                            <form action="Processes/certificate_insert.php" method="POST">
                                <input type="hidden" name="idd" value="<?php echo $_SESSION['user'] ?>">
                                <h6 class="heading-small text-muted mb-4">Certificate information</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label"
                                                    for="input-Certificate">Certificate</label>
                                                <input type="text" name="named" id="input-Certificate"
                                                    class="form-control" placeholder="Enter Name Of Certificate">
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
                                                <input type="date" name="dated" id="input-datecer" class="form-control">
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Add">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card bg-default shadow">
                        <div class="card-header bg-transparent border-0">
                            <h3 class="text-white mb-0">Certificate</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-dark table-flush">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" class="sort">Certificate</th>
                                        <th scope="col" class="sort">Date</th>

                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    <?php
                                $id=$_SESSION['user'];
                                try{
                                    require("db/db.php");
                                    $qry ="SELECT *  FROM certificate WHERE user=$id ";
                                    $verify = mysqli_query($conn,$qry);
                                    while($row = mysqli_fetch_array($verify,MYSQLI_ASSOC)){
                                    
                            ?>
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <a href="#" class="mr-3">
                                                    <img alt="Image placeholder"
                                                        src="../assets/img/<?php echo $row['img'] ?>"
                                                        style="width: 200px;height: 200px; border-radius: 50%;">
                                                </a>
                                                <div class="media-body">
                                                    <a href="#">
                                                        <span
                                                            class="name mb-0 text-sm text-white"><?php echo $row['name'] ?>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="budget">
                                            <?php echo $row['date'] ?>
                                        </td>

                                        <td class="">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item"
                                                        href="certificate_edit.php?idcertif=<?php echo $row['id'] ?>">Edit</a>
                                                    <a class="dropdown-item"
                                                        href="Processes/certificate_delete.php?idcertif=<?php echo $row['id'] ?>">Delete</a>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php

                                        
                                    }
                                    mysqli_close($conn);
                                    }
                                    catch(Exception $e){
                                        'Caught exception: '.  $e->getMessage(). "\n";
                                    }
                                    ?>
                                </tbody>
                            </table>
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