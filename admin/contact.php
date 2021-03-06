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
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Add Contact Type </h3>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">

                            <form action="Processes/contacttype_insert.php" method="post" role="form">

                                <h6 class="heading-small text-muted mb-4">Contact Type information</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">type</label>
                                                <input type="text" name="name" id="input-username" class="form-control"
                                                    placeholder="facebook,github...">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-first-name">Icon</label>
                                                <input type="text" name="icon" id="input-first-name"
                                                    class="form-control"
                                                    placeholder="Like->( bx bxl-html5,OR,fab fa-html5 )">
                                            </div>
                                            <div class="text-center">
                                                <a style="margin-right: 10px;"
                                                    href="https://fontawesome.com/v5.15/icons/">Font Awesome</a>
                                                <a href="https://boxicons.com/">Boxicons</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <input type="submit" class="btn btn-primary" value="Add">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Add Contact </h3>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">

                            <form action="Processes/contact_insert.php" method="post" role="form">
                                <input type="hidden" name="id" value="<?php echo $_SESSION['user'] ?>">
                                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">content</label>
                                                <input type="text" name="name" id="input-username" class="form-control"
                                                    placeholder="ex@exmpl.com">
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
                                                    mysqli_close($conn);
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
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card bg-default shadow">
                        <div class="card-header bg-transparent border-0">
                            <h3 class="text-white mb-0">Contact</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-dark table-flush">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" class="sort">type</th>
                                        <th scope="col" class="sort">Content</th>

                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    <?php
                                $id=$_SESSION['user'];
                                try{
                                    require("db/db.php");
                                    $qry ="SELECT *  FROM contact WHERE user=$id ";
                                    $verify = mysqli_query($conn,$qry);
                                    while($row = mysqli_fetch_array($verify,MYSQLI_ASSOC)){
                                        $type =$row['type'];
                                        
                                    
                            ?>
                                    <tr>
                                        <th scope="row">
                                            <?php
                                            try{
                                                $qryy ="SELECT *  FROM contacttype WHERE id=$type ";
                                                $verifyy = mysqli_query($conn,$qryy);
                                                $roww = mysqli_fetch_assoc($verifyy);

                                            ?>
                                            <div class="media align-items-center">
                                                <a href="#" class="avatar rounded-circle mr-3">
                                                    <i class='<?php echo $roww['icon'] ?> skills__icon'></i>
                                                </a>
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm"><?php echo $roww['name'] ?></span>
                                                </div>
                                            </div>
                                        </th>
                                        <?php
                                            
                                            
                                            }
                                            catch(Exception $e){
                                                'Caught exception: '.  $e->getMessage(). "\n";
                                            }
                                            ?>

                                        <td class="budget">
                                            <?php echo $row['content'] ?>
                                        </td>
                                        <td class="">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item"
                                                        href="contact_edit.php?idcont=<?php echo $row['id'] ?>">Edit</a>
                                                    <a class="dropdown-item"
                                                        href="Processes/contact_delete.php?idcont=<?php echo $row['id'] ?>">Delete</a>

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