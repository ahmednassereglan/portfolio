<?php   
                $idd=1;
                try{
                    require("admin/db/db.php");
                    $qry ="SELECT *  FROM user WHERE id=$idd ";
                    $verify = mysqli_query($conn,$qry);
                    $row = mysqli_fetch_assoc($verify);
                    mysqli_close($conn);
                }
                catch(Exception $e){
                    'Caught exception: '.  $e->getMessage(). "\n";
                }
                ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php require "resourse/cssfile.php"; ?>


    <title>Portfolio website complete</title>

</head>

<body>
    <!--===== HEADER =====-->
    <header class="l-header">
        <nav class="nav bd-grid">
            <div>

                <a href="#" class="nav__logo"><?php echo $row['nickname'] ?></a>
                <?php                           
                
                ?>
            </div>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="#home" class="nav__link active">Home</a></li>
                    <li class="nav__item"><a href="#about" class="nav__link">About</a></li>
                    <li class="nav__item"><a href="#skills" class="nav__link">Skills</a></li>
                    <li class="nav__item"><a href="#work" class="nav__link">Work</a></li>
                    <li class="nav__item"><a href="#certificate" class="nav__link">Certificate</a></li>
                    <li class="nav__item"><a href="#contact" class="nav__link">Contact</a></li>
                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header>

    <main class="l-main">
        <!--===== HOME =====-->
        <section class="home bd-grid" id="home">
            <div class="home__data">
                <h1 class="home__title" style="font-size: 45px;">Hi,<br>I'am <span
                        class="home__title-color"><?php echo $row['nickname'] ?></span><br><?php echo $row['job'] ?>
                </h1>

                <a href="#" class="button">Contact</a>
            </div>

            <div class="home__social">
                <?php
                $idicon=$row['id'];
                try{
                    require("admin/db/db.php");
                    $qryicon ="SELECT *  FROM contact WHERE user=$idicon ";
                    $verifyicon = mysqli_query($conn,$qryicon);
                    while($rowicon = mysqli_fetch_array($verifyicon,MYSQLI_ASSOC)){
                        $typecont =$rowicon['type'];

                        if ($rowicon['type'] == 1 || $rowicon['type'] == 7 || $rowicon['type'] == 6 || $rowicon['type'] == 5) {
                            ?>
                <?php
            try {
                $qryycont ="SELECT *  FROM contacttype WHERE id=$typecont ";
                $verifyycont = mysqli_query($conn, $qryycont);
                $rowwcont = mysqli_fetch_assoc($verifyycont); ?>
                <a data-toggle="tooltip" data-placement="top" title="<?php echo $rowicon['content']?>" href=""
                    class="home__social-icon"><i class='<?php echo $rowwcont['icon'] ?>'></i></a>
                <?php
            } catch (Exception $e) {
                'Caught exception: '.  $e->getMessage(). "\n";
            } ?>
                <?php
                        }else{
                            try {
                                $qryycont ="SELECT *  FROM contacttype WHERE id=$typecont ";
                                $verifyycont = mysqli_query($conn, $qryycont);
                                $rowwcont = mysqli_fetch_assoc($verifyycont); ?>
                <a target="_blank" href="<?php echo $rowicon['content']?>" class="home__social-icon"><i
                        class='<?php echo $rowwcont['icon'] ?>'></i></a>

                <?php
                            } catch (Exception $e) {
                                'Caught exception: '.  $e->getMessage(). "\n";
                            } ?>



                <?php 
                }                       
            }
            mysqli_close($conn);
            }
            catch(Exception $e){
                'Caught exception: '.  $e->getMessage(). "\n";
            }
                ?>
            </div>

            <div class="home__img">
                <img src="assets/img/perfilahmed1.png" alt="">
            </div>
        </section>

        <!--===== ABOUT =====-->
        <section class="about section " id="about">
            <h2 class="section-title">About</h2>

            <div class="about__container bd-grid">
                <div class="about__img">
                    <img src="assets/img/<?php echo $row['img'] ?>" alt="">
                </div>

                <div>
                    <h2 class="about__subtitle">I'am <br> <?php echo $row['name'] ?></h2>
                    <p class="about__text"><?php echo $row['aboutme'] ?></p>
                </div>
            </div>
        </section>

        <!--===== SKILLS =====-->
        <section class="skills section" id="skills">
            <h2 class="section-title">Skills</h2>

            <div class="skills__container bd-grid">
                <div>
                    <h2 class="skills__subtitle">Profesional Skills</h2>
                    <p class="skills__text"></p>
                    <?php
                            $ids=$row['id'];
                            try{
                                require("admin/db/db.php");
                                $qrys ="SELECT *  FROM skils WHERE user=$ids ";
                                $verifys = mysqli_query($conn,$qrys);
                                while($rows = mysqli_fetch_array($verifys,MYSQLI_ASSOC)){
                                    $skillrate=$rows['rate'];
                            
                        ?>
                    <div class="skills__data">

                        <div class="skills__names">
                            <i class="<?php echo $rows['icon'] ?> skills__icon"></i>
                            <span class="skills__name"><?php echo $rows['name'] ?></span>
                        </div>
                        <div style="width: <?php echo $rows['rate'] ?>%" class="skills__bar">

                        </div>
                        <div>
                            <span class="skills__percentage"><?php echo $rows['rate'] ?>%</span>
                        </div>

                    </div>
                    <?php   
                            }
                            mysqli_close($conn);
                            }
                            catch(Exception $e){
                                'Caught exception: '.  $e->getMessage(). "\n";
                            }
                        ?>

                </div>

                <div>
                    <img src="assets/img/work3.jpg" alt="" class="skills__img">
                </div>
            </div>
        </section>


        <!--===== WORK =====-->
        <section class="work section" id="work">
            <h2 class="section-title">Work</h2>

            <div class="work__container bd-grid">
                <!-- Button trigger modal -->
                <?php
                    $idw=$row['id'];
                    try{
                        require("admin/db/db.php");
                        $qryw ="SELECT *  FROM work WHERE user=$idw ";
                        $verifyw = mysqli_query($conn,$qryw);
                        while($roww = mysqli_fetch_array($verifyw,MYSQLI_ASSOC)){
                            
                    
                ?>
                <div class="work__img">
                    <img src="assets/img/<?php echo $roww['img'] ?>" alt="" data-toggle="modal"
                        data-target="#exampleModal<?php echo $roww['id'] ?>">
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal<?php echo $roww['id'] ?>" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel<?php echo $roww['id'] ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content" style="width: 700px; margin-left: -100px;">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel<?php echo $roww['id'] ?>">
                                    <?php echo $roww['name'] ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="width: 700px;">
                                <a target="_blank" href="<?php echo $roww['link'] ?>">
                                    <img style="width: 700px;height: 500px;" src="assets/img/<?php echo $roww['img'] ?>"
                                        alt="<?php echo $roww['name'] ?>">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php   
                    }
                    mysqli_close($conn);
                    }
                    catch(Exception $e){
                        'Caught exception: '.  $e->getMessage(). "\n";
                    }
                ?>

            </div>
        </section>

        <!--===== Certificate =====-->
        <section class="work section" id="certificate">
            <h2 class="section-title">Certificate</h2>

            <div class="work__container bd-grid">
                <!-- Button trigger modal -->
                <?php
                    $idc=$row['id'];
                    try{
                        require("admin/db/db.php");
                        $qryc ="SELECT *  FROM `certificate` WHERE user=$idc ";
                        $verifyc = mysqli_query($conn,$qryc);
                        while($rowc = mysqli_fetch_array($verifyc,MYSQLI_ASSOC)){
                            
                    
                ?>
                <div class="work__img">
                    <img src="assets/img/<?php echo $rowc['img'] ?>" alt="" data-toggle="modal"
                        data-target="#exampleModal<?php echo $rowc['id'] ?>">
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal<?php echo $rowc['id'] ?>" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel<?php echo $rowc['id'] ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content" style="width: 700px; margin-left: -100px;">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel<?php echo $rowc['id'] ?>">
                                    <?php echo $rowc['name'] ?> (<?php echo $rowc['date'] ?>)</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="width: 700px;">
                                <img style="width: 700px;height: 500px;" src="assets/img/<?php echo $rowc['img'] ?>"
                                    alt="<?php echo $rowc['name'] ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <?php   
                    }
                    mysqli_close($conn);
                    }
                    catch(Exception $e){
                        'Caught exception: '.  $e->getMessage(). "\n";
                    }
                ?>

            </div>
        </section>
        <?php
            if (isset($_GET['msg'])) {
                $msg=$_GET['msg'];
                if ($msg == 'sucess') {
                    echo '<script>alert("Thank you for send your massege \n I will see soon the massege")</script>';
                } else {
                    echo '<script>alert("'.$msg.'")</script>';
                }
            }
        ?>
        <!--===== CONTACT =====-->
        <section class="contact section" id="contact">
            <h2 class="section-title">Contact</h2>
            <div class="contact__container bd-grid">
                <form action="resourse/contact.php" method="POST" class="contact__form">
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                    <input type="text" name="name" placeholder="Name" class="contact__input">
                    <input type="email" name="email" placeholder="Email" class="contact__input">
                    <textarea placeholder="Write here your massege" name="content" cols="0" rows="10"
                        class="contact__input"></textarea>
                    <input type="submit" value="Send" class="contact__button button">
                </form>
            </div>
        </section>
    </main>

    <!--===== FOOTER =====-->
    <footer class="footer">
        <p class="footer__title">Marlon</p>
        <div class="footer__social">
            <?php
                $idicon=$row['id'];
                try{
                    require("admin/db/db.php");
                    $qryicon ="SELECT *  FROM contact WHERE user=$idicon ";
                    $verifyicon = mysqli_query($conn,$qryicon);
                    while($rowicon = mysqli_fetch_array($verifyicon,MYSQLI_ASSOC)){
                        $typecont =$rowicon['type'];

                        if ($rowicon['type'] == 1 || $rowicon['type'] == 7 || $rowicon['type'] == 6 || $rowicon['type'] == 5) {
                            ?>
            <?php
            try {
                $qryycont ="SELECT *  FROM contacttype WHERE id=$typecont ";
                $verifyycont = mysqli_query($conn, $qryycont);
                $rowwcont = mysqli_fetch_assoc($verifyycont); ?>
            <a data-toggle="tooltip" data-placement="top" title="<?php echo $rowicon['content']?>" href=""
                class="footer__icon"><i class='<?php echo $rowwcont['icon'] ?>'></i></a>
            <?php
            } catch (Exception $e) {
                'Caught exception: '.  $e->getMessage(). "\n";
            } ?>
            <?php
                        }else{
                            try {
                                $qryycont ="SELECT *  FROM contacttype WHERE id=$typecont ";
                                $verifyycont = mysqli_query($conn, $qryycont);
                                $rowwcont = mysqli_fetch_assoc($verifyycont); ?>
            <a target="_blank" href="<?php echo $rowicon['content']?>" class="footer__icon"><i
                    class='<?php echo $rowwcont['icon'] ?>'></i></a>

            <?php
                            } catch (Exception $e) {
                                'Caught exception: '.  $e->getMessage(). "\n";
                            } ?>



            <?php 
                }                       
            }
            mysqli_close($conn);
            }
            catch(Exception $e){
                'Caught exception: '.  $e->getMessage(). "\n";
            }
                ?>
        </div>
        <p style="margin-left: 100px;">&#169; 2020 copyright all right reserved <a href="admin/login.php"
                style="opacity: 0;">ahemd</a> </ps>
    </footer>


    <!--===== fontawesome =====-->

    <?php require "resourse/jsfile.php"; ?>
</body>

</html>