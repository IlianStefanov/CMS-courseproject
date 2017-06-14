<?php 
    include "includes/db.php"; 
//    ob_start();
//    session_start();
    include "admin/functions.php";
    include "includes/header.php"; 
    
    // Navigation bar
    include "includes/navbar.php";
//    register_user_index();
?>

<!-- Page Content -->
<div class="container">
    
<section id="login">
    <div class="row">
        <div class="col-xs-8 col-md-6 col-lg-6" id="reg-section">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
</section>


<!--<hr>-->



<?php include "includes/footer.php";?>
