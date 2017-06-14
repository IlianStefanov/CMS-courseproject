<?php 
    include "includes/db.php"; 
    include "includes/header.php"; 
    // Navigation bar
    include "includes/navbar.php";
    include "admin/functions.php";
?>

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

                <?php category_page_view(); ?>
                
                
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
            
            <div class="container container-bg">
                
                <!-- <div class="row form-box">
                    
                    
                    

                   
                    <div class="col-md-6 col-xs-12 col-lg-6 section-form-left">
                        <h3 class="section-form-left-header">
                            Lorem ipsum ke passa ha
                        </h3>

                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.

                        </p>
                        <span class="glyphicon glyphicon-search glyphicon-form" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-volume-up glyphicon-form" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-camera glyphicon-form" aria-hidden="true"></span>
                      <span class="glyphicon glyphicon-chevron-up glyphicon-form" aria-hidden="true"></span>

                        

                    </div>
				</div> -->
			</div>
		</div>
        <!-- /.row -->
		<hr>

        
<?php include "includes/footer.php"; ?>