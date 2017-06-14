<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

        <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row custom_bg">
                    <?php edit_post_alert(); ?>
                    <?php makeNewPost(); ?>
                    
                    <div class="col-lg-12">
                        <h2 class="page-header">
                            All posts!
                            <small>In one place</small>
                        </h2>

                        <?php 
                        if (isset($_GET['source'])) {
                            $source = $_GET['source'];

                        } else {
                            $source = "";
                        }
                        switch ($source) {
                            case 'add_post':
                                include "includes/add_post.php";
                                break;
                            case 'edit_post':
                                include "includes/edit_post.php";
                                break;
                            case 'post_comments':
                                include "includes/post_comments.php";
                                break;
                            default:
                                include "includes/view_all_posts.php";
                                break;
                           }
                        ?>
                    </div>
                </div>
                
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

<?php include "includes/admin_footer.php"; ?>
