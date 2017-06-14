<?php 
    include "includes/db.php"; 
    ob_start();
    session_start();    
    include "includes/header.php"; 
    // Navigation bar
    include "includes/navbar.php";
    include "admin/functions.php";

?>
    <?php submit_comment_alert(); ?>
    <!-- Page Content -->
    <div class="jumbotron">
          <h1>Ed heeran</h1>
          <p class="main_p">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
          <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
    </div>
    <div class="container">

        <div class="row">
            
            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    POSTS

                    <small>DIVIDE 
                        <span class="divide-symbol"></span>
                    </small>
                </h1>

                <!-- First Blog Post -->

                <?php post_details(); ?>
                
                <?php include "includes/comments.php" ?>
                

            </div>

            <!-- SIDEBAR INCLUDE -->
            <?php include "includes/sidebar.php"; ?>
            
            <div class="container container-bg">
                
            
            </div>
        </div>
        <!-- /.row -->
       <!--  <hr> -->

        
<?php include "includes/footer.php"; ?>