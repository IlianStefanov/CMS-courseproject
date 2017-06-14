<?php include "includes/admin_header.php"; ?>
   
   <?php 
      if (isset($_SESSION['username'])) {
          $username = $_SESSION['username'];
          $query_session = "SELECT * FROM users WHERE username = '{$username}'";
          
          $query_session_result = mysqli_query($connection, $query_session);
          
          while($row = mysqli_fetch_array($query_session_result)) {
              $user_id = $row['user_id']; 
			  $username = $row['username'];
    		  $user_password = $row['user_password'];
    		  $user_firstname = $row['user_firstname'];
    		  $user_lastname = $row['user_lastname'];
    		  $user_email = $row['user_email'];
    		  $user_image = $row['user_image'];  
    		  $user_role = $row['user_role'];  
              
              
          }
          
          
       }

        if (isset($_POST['edit_user'])) {
                // global $connection;

                $username_text = $_POST['username_text'];
                $user_password_field = $_POST['user_password_field'];
                $user_firstname_field = $_POST['user_firstname_field'];
                $user_lastname_field = $_POST['user_lastname_field'];
                $user_email_field = $_POST['user_email_field'];
                $user_role_field = $_POST['user_role'];
                $user_image_field = $_FILES['user_image_field']['name'];
                $user_image_temp_field = $_FILES['user_image_field']['tmp_name'];

                move_uploaded_file($user_image_temp_field, "../images/userImages/$user_image_field"); 

                if (empty($user_image_field)) {
                    $query = "SELECT * FROM users WHERE username = '{$username}' ";
                    $select_image = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_array($select_image)) {
                        $user_image_field = $row['user_image'];
                    }
                }

                $query_edit_user = "UPDATE users SET ";
                $query_edit_user .= "username = '{$username_text}', ";
                $query_edit_user .= "user_password = '{$user_password_field}', ";
                $query_edit_user .= "user_firstname = '{$user_firstname_field}', ";
                $query_edit_user .= "user_lastname = '{$user_lastname_field}', ";
                $query_edit_user .= "user_email = '{$user_email_field}', ";
                $query_edit_user .= "user_image = '{$user_image_field}', ";
                $query_edit_user .= "user_role = '{$user_role_field}' ";
                $query_edit_user .= "WHERE username = '{$username}' ";

                $query_edit_user_result = mysqli_query($connection, $query_edit_user);

                confirmQuery($query_edit_user_result);
                header("Location: users.php");
            }

   ?>
   
   <?php 
        
   ?>
    

    <div id="wrapper">

        <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row custom_bg">
                    <div class="col-lg-12">
                        <div class="row">
                          <div class="col-xs-6 col-md-3">
                            <a href="#" class="thumbnail">
                              <img src="../images/userImages/<?php echo $user_image; ?>" alt="post_image">
                              
                              
                            </a>
                          </div>
                   
                        </div>
                
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
