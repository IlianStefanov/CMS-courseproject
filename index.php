<?php 
    include "includes/db.php"; 
    ob_start();
    session_start();
    include "admin/functions.php";
    include "includes/header.php"; 
    
    // Navigation bar
    include "includes/navbar.php";
    register_user_index();
?>



<?php register_user_alert(); ?>

<!-- Page Content -->
<div class="jumbotron" id="jumbotron">
    <h1>Ed Sheeran</h1>
    <p class="main_p">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
    <p><a class="btn btn-primary btn-lg rm-btn-jumbotron" href="#" role="button">Learn more</a></p>
</div>



<div class="sticky-pagination">
    <ul>
        <li class="fb"></li>
        <li class="twitter"></li>
        <li class="linked"></li>
        <li class="insta"></li>
        <li class="youtube"></li>
    </ul>
</div>

<div class="container" id="container">

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
            
            <?php showAllPosts_blog(); ?>
             <div class="container">
        
        <div class="row">
            <div class="col-xs-12 col-md-3">
                <a href="#" class="thumbnail">
                    <img src="http://i.imgur.com/JVX4l.jpg" alt="...">
                </a>
            </div>
            
            <div class="col-xs-12 col-md-3">
                <a href="#" class="thumbnail">
                    <img src="http://i.imgur.com/JVX4l.jpg" alt="...">
                </a>
            </div>
            
            <div class="col-xs-12 col-md-3">
                <a href="#" class="thumbnail">
                    <img src="http://i.imgur.com/JVX4l.jpg" alt="...">
                </a>
            </div>
            
            <div class="col-xs-12 col-md-3">
                <a href="#" class="thumbnail">
                    <img src="http://i.imgur.com/JVX4l.jpg" alt="...">
                </a>
            </div>
            
        </div>
        
    </div>
            <!-- Pager -->

            <div class="pagination-container pagination-wrapper wow zoomIn mar-b-1x" data-wow-duration="0.5s" style="text-align: center;">
           
            <ul class="pagination">

                <?php pagination_logic(); ?>
                
            </ul>

</div>
            
        </div>

        <!-- SIDEBAR INCLUDE -->

        <?php include "includes/sidebar.php"; ?>

    </div>
</div>
    <!-- /.row -->
    <!-- <hr> -->


    <?php include "includes/footer.php"; ?>
