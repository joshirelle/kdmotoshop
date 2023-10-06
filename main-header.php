<header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo"><b>KD</b>Motorshop</a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php if(isset($_SESSION["login_id"])){ echo $_SESSION["profile_image"];}else{ echo "dist/img/user.png";} ?>" class="user-image" alt="User Image"/>
                <span class="hidden-xs"><?php echo $_SESSION["name"] ?? "Name not found"; ?></span>
            </a>
            <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                <img src="<?php if(isset($_SESSION["login_id"])){ echo $_SESSION["profile_image"];}else{ echo "dist/img/user.png";} ?>" class="img-circle" alt="User Image" />
                <p>
                    <?php echo $_SESSION["name"] ?? "Name not found"; ?>
                    <small><?php echo $_SESSION["name"] ?? "Email not found"; ?></small>
                </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                    <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
                </li>
            </ul>
            </li>
        </ul>
        </div>
    </nav>
    </header>