<?php 
    include "includes/db.php"; 
    ob_start();
    session_start();
    include "includes/header.php"; 
    // Navigation bar
    include "includes/navbar.php";
    include "admin/functions.php";
?>

    <!-- Page Content -->
    <div class="jumbotron" id="jumbotron">
    <h1>Ed Sheeran</h1>
    <p class="main_p">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
    <p><a class="btn btn-primary btn-lg rm-btn-jumbotron" href="#" role="button">Learn more</a></p>
</div>

    <!-- MAIN CONTENT -->
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

                <?php search_posts(); ?>

			    <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- SIDEBAR INCLUDE -->
            <?php include "includes/sidebar.php"; ?>
        </div>
        <!-- /.row -->

        

        
<?php include "includes/footer.php"; ?>


