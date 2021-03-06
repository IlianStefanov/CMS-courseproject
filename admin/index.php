<?php include "includes/admin_header.php"; ?>

<div id="wrapper">

    
   
    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">
            
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                       
                    <h1 class="page-header">
                        Welcome to Admin Panel
                        <span class="name-user"><?php echo $_SESSION['username']; ?></span>
                    
                    </h1>
                    
                    
             
                </div>
            </div>
            <!-- /.row -->

            <!-- /.row -->

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-text fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                  
                                    <div class='huge'><?php echo $post_count = record_count('posts'); ?></div>
                                   
                                    <div>Posts</div>
                                </div>
                            </div>
                        </div>
                        <a href="posts.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                   
                                    <div class='huge'><?php echo $comments_count = record_count('comments') ?></div>
                                    <div>Comments</div>
                                </div>
                            </div>
                        </div>
                        <a href="comments.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                   
                                    <div class='huge'><?php echo $users_count = record_count('users'); ?></div>
                                    <div> Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="users.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                  
                                    <div class='huge'><?php echo $categories_count = record_count('categories'); ?></div>
                                    <div>Categories</div>
                                </div>
                            </div>
                        </div>
                        <a href="categories.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <?php 
                $query_posts_draft = "SELECT * FROM posts WHERE post_status = 'draft'";
                $query_posts_draft_result = mysqli_query($connection, $query_posts_draft);
                $draft_count = mysqli_num_rows($query_posts_draft_result);
            
            
                $query_users = "SELECT * FROM users WHERE user_role = 'subscriber'";
                $query_users_result = mysqli_query($connection, $query_users);
                $subscribers_count = mysqli_num_rows($query_users_result);
            ?>
            
            <div class="row">
                <script type="text/javascript">
                      google.charts.load('current', {'packages':['bar']});
                      google.charts.setOnLoadCallback(drawChart);

                      function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                          ['Data', 'Count'],
                            
                            <?php  
                                $element_text = ['Active post','Draft post', 'Categories', 'Users', 'Comments','Subscribers'];   
                                $element_count = [$post_count,$draft_count , $categories_count, $users_count, $comments_count,$subscribers_count];
                            
                                for($i = 0; $i < 6; $i++) {
                                      echo  "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
                                }
                            ?>
                            
//                          ['Post', 1000],
                         
                        ]);

                        var options = {
                          chart: {
                            title: 'Company Performance',
                            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                          }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, options);
                      }
                </script>
                <div id="columnchart_material"></div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include "includes/admin_footer.php"; ?>
