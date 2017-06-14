<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row custom_bg">
                    <div class="col-lg-12">
                        <h2 class="page-header">
                            All posts!
                            <small>In one place</small>
                        </h2>
                <form action="" method="post" enctype="multipart/form-data">        
                <div class="form-group">
					<label for="username_text">Username</label>
					<input type="text" name="username_text" class="form-control input_field" value="<?php echo $username; ?>">
				</div>
		
				<div class="form-group">
					<label for="post_category_id">Password</label>
					<input type="password" name="user_password_field" class="form-control input_field" value="<?php echo $user_password; ?>">
				</div>

				<div class="form-group">
					<label for="user_firstname_field">First name</label>
					<input type="text" name="user_firstname_field" class="form-control input_field" value="<?php echo $user_firstname; ?>">
				</div>

				<div class="form-group">
					<label for="user_lastname_field">Last name</label>
					<input type="text" class="form-control input_field" name="user_lastname_field" value="<?php echo $user_lastname; ?>">
				</div>

				<div class="form-group">
					<label for="user_email_field">Email</label>
					<input type="text" name="user_email_field" class="form-control input_field" value="<?php echo $user_email; ?>">
				</div>
				<div class="form-group">
					<select name="user_role" id="user_role" class="input_field">
							<?php 
								if ($user_role == "admin") { ?>
									<option value="admin">Admin</option>
		                    		<option value="subscriber">Subscriber</option>
						  <?php } else { ?>
						  			<option value="subscriber">Subscriber</option>
									<option value="admin">Admin</option>
		                  <?php  }
							?>
		            </select>
				</div>

				<div class="form-group">
					<label for="user_image_field">Post Image</label>
					<div class="post_image_box">
						<img src="../images/userImages/<?php echo $user_image; ?>" alt="post_image" width="150">
					</div>
					<input type="file" name="user_image_field" class="image-upload">
				</div>
                   
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="edit_user" value="Update Profile">
                    </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>