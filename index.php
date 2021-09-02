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

    <link rel="stylesheet" href="assets/css/styles.css">

    <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
    <!-- =====BOX ICONS===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <title>Portfolio website complete</title>
    <style>
    #myImgcer {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    #myImgcer:hover {
        opacity: 0.7;
    }

    /* The Modal (background) */
    .modalcer {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.9);
        /* Black w/ opacity */
    }

    /* Modal Content (image) */
    .modal-contentcer {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
    }

    /* Caption of Modal Image */
    #captioncer {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    /* Add Animation */
    .modal-contentcer,
    #captioncer {
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @-webkit-keyframes zoom {
        from {
            -webkit-transform: scale(0)
        }

        to {
            -webkit-transform: scale(1)
        }
    }

    @keyframes zoom {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
    }

    /* The Close Button */
    .closecer {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .closecer:hover,
    .closecer:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px) {
        .modal-contentcer {
            width: 100%;
        }
    }
    </style>
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
                <a href="" class="home__social-icon"><i class='bx bxl-linkedin'></i></a>
                <a href="" class="home__social-icon"><i class='bx bxl-behance'></i></a>
                <a href="" class="home__social-icon"><i class='bx bxl-github'></i></a>
            </div>

            <div class="home__img">
                <img src="assets/img/perfilahmed.png" alt="">
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
                    <p class="skills__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Velit optio id
                        vero amet, alias architecto consectetur error eum eaque sit.</p>
                    <?php
                            $id=$row['id'];
                            try{
                                require("admin/db/db.php");
                                $qry ="SELECT *  FROM skils WHERE user=$id ";
                                $verify = mysqli_query($conn,$qry);
                                while($row = mysqli_fetch_array($verify,MYSQLI_ASSOC)){
                                    $skillrate=$row['rate'];
                            
                        ?>
                    <div class="skills__data">

                        <div class="skills__names">
                            <i class="<?php echo $row['icon'] ?> skills__icon"></i>
                            <span class="skills__name"><?php echo $row['name'] ?></span>
                        </div>
                        <div style="width: <?php echo $row['rate'] ?>%" class="skills__bar">

                        </div>
                        <div>
                            <span class="skills__percentage"><?php echo $row['rate'] ?>%</span>
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
                <div class="work__img">
                    <img src="assets/img/work1.jpg" alt="">
                </div>
                <div class="work__img">
                    <img src="assets/img/work2.jpg" alt="">
                </div>
                <div class="work__img">
                    <img src="assets/img/work3.jpg" alt="">
                </div>
                <div class="work__img">
                    <img src="assets/img/work4.jpg" alt="">
                </div>
                <div class="work__img">
                    <img src="assets/img/work5.jpg" alt="">
                </div>
                <div class="work__img">
                    <img src="assets/img/work6.jpg" alt="">
                </div>
            </div>
        </section>

        <!--===== WORK =====-->
        <section class="work section" id="work">
            <h2 class="section-title">Certificate</h2>

            <div class="work__container bd-grid">
                <div class="work__img">
                    <img id="myImgcer" src="assets/img/work1.jpg" alt="Snow" style="width:100%;max-width:300px">
                </div>
                <div class="work__img">
                    <img id="myImgcer" src="assets/img/work1.jpg" alt="Snow" style="width:100%;max-width:300px">
                </div>
                <div class="work__img">
                    <img id="myImgcer" src="assets/img/work1.jpg" alt="Snow" style="width:100%;max-width:300px">
                </div>
                <div class="work__img">
                    <img id="myImgcer" src="assets/img/work1.jpg" alt="Snow" style="width:100%;max-width:300px">
                </div>
                <div class="work__img">
                    <img id="myImgcer" src="assets/img/work1.jpg" alt="Snow" style="width:100%;max-width:300px">
                </div>
                <div class="work__img">
                    <img id="myImgcer" src="assets/img/work1.jpg" alt="Snow" style="width:100%;max-width:300px">
                </div>
            </div>
        </section>

        <!--===== CONTACT =====-->
        <section class="contact section" id="contact">
            <h2 class="section-title">Contact</h2>

            <div class="contact__container bd-grid">
                <form action="" class="contact__form">
                    <input type="text" placeholder="Name" class="contact__input">
                    <input type="mail" placeholder="Email" class="contact__input">
                    <textarea name="" id="" cols="0" rows="10" class="contact__input"></textarea>
                    <input type="button" value="Enviar" class="contact__button button">
                </form>
            </div>
        </section>
    </main>

    <!--===== FOOTER =====-->
    <footer class="footer">
        <p class="footer__title">Marlon</p>
        <div class="footer__social">
            <a href="#" class="footer__icon"><i class='bx bxl-facebook'></i></a>
            <a href="#" class="footer__icon"><i class='bx bxl-instagram'></i></a>
            <a href="#" class="footer__icon"><i class='bx bxl-twitter'></i></a>
        </div>
        <p style="margin-left: 100px;">&#169; 2020 copyright all right reserved <a href="admin/login.php"
                style="opacity: 0;">ahemd</a> </ps>
    </footer>


    <!--===== fontawesome =====-->
    <script src="https://kit.fontawesome.com/28d30b702d.js" crossorigin="anonymous"></script>

    <!--===== SCROLL REVEAL =====-->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!--===== MAIN JS =====-->
    <script src="assets/js/main.js"></script>
    <script>
    // Get the modal
    var modal = document.getElementById("myModalcer");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById("myImgcer");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("captioncer");
    img.onclick = function() {
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("closecer")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
    </script>
</body>

</html>