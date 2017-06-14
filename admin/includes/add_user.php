<?php register_user_admin(); ?>
<div class="col-xs-12 col-md-6 col-lg-6">
    <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="username_text">Username</label>
            <input type="text" name="username_text" class="form-control input_field">
        </div>

        <div class="form-group">
            <label for="post_category_id">Password</label>
            <input type="password" name="user_password_field" class="form-control input_field">
        </div>

        <div class="form-group">
            <label for="user_firstname_field">First name</label>
            <input type="text" name="user_firstname_field" class="form-control input_field">
        </div>

        <div class="form-group">
            <label for="user_lastname_field">Last name</label>
            <input type="text" class="form-control input_field" name="user_lastname_field">
        </div>

        <div class="form-group">
            <label for="user_email_field">Email</label>
            <input type="text" name="user_email_field" class="form-control input_field">
        </div>
        <div class="form-group">
            <select name="user_role" id="user_role" class="input_field">
                <option value="admin">Admin</option>
                <option value="subscriber">Subscriber</option>
            </select>
        </div>
        <div class="form-group">
            <label for="user_image_field">Post Image</label>
            <input type="file" name="user_image_field" class="image-upload">
        </div>



        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="reg" value="Add User" id="add_user">
        </div>

    </form>
</div>
