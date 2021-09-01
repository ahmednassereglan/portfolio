<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="../assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $admin ?>" href="admin.php">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $user ?>" href="user.php">
                            <i class="ni ni-single-02 text-orange"></i>
                            <span class="nav-link-text">Profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $skill ?>" href="skill.php">
                            <i class="ni ni-diamond text-success "></i>
                            <span class="nav-link-text">Skills</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $work ?>" href="work.php">
                            <i class="ni ni-folder-17 text-primary"></i>
                            <span class="nav-link-text">Works</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $certificate ?>" href="certificate.php">
                            <i class="ni ni-bullet-list-67 text-default"></i>
                            <span class="nav-link-text">Certificates</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.html">
                            <i class="ni ni-key-25 text-info"></i>
                            <span class="nav-link-text">Contact</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.html">
                            <i class="ni ni-circle-08 text-pink"></i>
                            <span class="nav-link-text">Notifications</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">
                            <i class="ni ni-send text-dark"></i>
                            <span class="nav-link-text">Register</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.html">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>

                </ul>
                <!-- Divider -->
                <hr class="my-3">
                <!-- Heading -->
                <h6 class="navbar-heading p-0 text-muted">
                    <span class="docs-normal">Other</span>
                </h6>
                <!-- Navigation -->
                <ul class="navbar-nav mb-md-3">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">
                            <i class="ni ni-spaceship"></i>
                            <span class="nav-link-text">Log out</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>