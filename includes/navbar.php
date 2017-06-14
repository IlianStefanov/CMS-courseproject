<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container border-bottom-line">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                <!-- Eleans -->
                <img src="admin/images/skillGround2.png" alt="">
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php 
                    $category_class = '';
                    $registration_class = '';
                
                    $page_name = basename($_SERVER['PHP_SELF']);
                      
                
                    if(isset($_SESSION['username']) && $_SESSION['role'] == 'admin') { ?>
                        <li class='<?php echo ($page_name == 'index.php' ? 'active' : '')?>'>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="index.php">About us</a>
                        </li>
                        <li class='<?php echo ($page_name == 'contacts.php' ? 'active' : '')?>'>
                            <a href="contacts.php">Contacts</a>
                        </li>
                        <li>
                            <a href="admin/index.php">Admin</a>
                        </li>
                <?php }
                
                    else if(isset($_SESSION['username']) && $_SESSION['role'] == 'subscriber') { ?>
                        <li class='<?php echo ($page_name == 'index.php' ? 'active' : '')?>'>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="index.php">About us</a>
                        </li>
                        <li class='<?php echo ($page_name == 'contacts.php' ? 'active' : '')?>'>
                            <a href="contacts.php">Contacts</a>
                        </li>

                <?php } else { ?>
                        <li class='<?php echo ($page_name == 'index.php' ? 'active' : '')?>'>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="index.php">About us</a>
                        </li>
                        <li class='<?php echo ($page_name == 'contacts.php' ? 'active' : '')?>'>
                            <a href="contacts.php">Contacts</a>
                        </li>
                <?php }
                ?>

            </ul>

            <ul class="nav navbar-nav navbar-right">
               
                
                <?php 
                    if(!isset($_SESSION['username'])) { ?>
                        <!--        LOGIN MENU        -->
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                        <ul id="login-dp" class="dropdown-menu">
                            <li>
                                <div class="row">
                                    <div class="col-md-12">
                                        Login via
                                        <div class="social-buttons">
                                            <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                                            <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
                                        </div>
                                        or
                                        <?php include "includes/login_form.php"; ?>
                                    </div>
                                    <div class="bottom text-center">
                                        New here?
                                        <!-- <a href="#enquirypopup"><b>Register</b></a> -->
                                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#enquirypopup">Register</button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>    
              <?php } else { ?>
                        <!--      PROFILE MENU      -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['username']; ?> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="includes/logout.php" class="btn-logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                                </li>
                            </ul>
                        </li>
                        
              <?php }
                       
              ?>
                </ul>
            
            

            <?php include "includes/registration_form.php" ?>


        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
