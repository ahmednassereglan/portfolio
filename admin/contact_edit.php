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
    <?php $contact='active' ?>
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
                                            } else {
                                                $msg= 'There is something wrong';
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
                                    <h3 class="mb-0">Add Contact </h3>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <?php
                                $idcont=$_GET['idcont'];
                                $id=$_SESSION['user'];
                                try{
                                    require("db/db.php");
                                    $qry ="SELECT *  FROM `contact` WHERE user=$id AND id=$idcont LIMIT 1";
                                    $verify = mysqli_query($conn,$qry);
                                    while($row = mysqli_fetch_array($verify,MYSQLI_ASSOC)){
                                    
                            ?>

                            <form action="Processes/contact_edit.php" method="post" role="form">
                                <input type="hidden" name="id" value="<?php echo $_SESSION['user'] ?>">
                                <input type="hidden" name="idcont" value="<?php echo $row['id'] ?>">
                                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">content</label>
                                                <input type="text" name="name" id="input-username" class="form-control"
                                                    placeholder="ex@exmpl.com" value="<?php echo $row['content'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-city">Type</label>
                                                <select name="type" class="form-control" required>
                                                    <?php
                                                    try{
                                                        require("db/db.php");
                                                        $qry ="SELECT *  FROM contacttype";
                                                        $verify = mysqli_query($conn,$qry);
                                                        while($row = mysqli_fetch_array($verify,MYSQLI_ASSOC)){
                                                        
                                                    ?>
                                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?>
                                                    </option>
                                                    <?php
                                                    }
                                                    
                                                    }
                                                    catch(Exception $e){
                                                        'Caught exception: '.  $e->getMessage(). "\n";
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <input type="submit" class="btn btn-primary" value="Add">
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