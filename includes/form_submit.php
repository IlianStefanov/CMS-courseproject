<?php 
    if (isset($_POST['create_post'])) {
        $post_title = $_POST['title'];
        $post_category_id = $_POST['post_category_id'];
        $post_author = $_POST['post_author'];
        $post_status = $_POST['post_status'];

        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];

        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date("d-m-y");
        $post_comment_count = 4; 

        move_uploaded_file($post_image_temp, "images/$post_image"); 
    }
?>

<div class="col-xs-12 col-md-6 col-lg-12 centrated_form">
    <form action="" method="post" enctype="multipart/form-data" class="post_form">
    
        <div class="form-group">
            <label for="title">Post Title</label>
            <input type="text" name="title" class="form-control form-input">
        </div>


        <div class="form-group">
            <label for="post_category_id">Post Category ID</label>
            <input type="text" name="post_category_id" class="form-control form-input">
        </div>


        <div class="form-group">
            <label for="post_author">Post Author</label>
            <input type="text" name="post_author" class="form-control form-input">
        </div>


        <div class="form-group">
            <label for="post_status">Post Status</label>
            <input type="text" class="form-control" name="post_status">
        </div>


        <div class="form-group">
            <!-- <label for="post_image">Post Image</label> -->
            <input type="file" name="image" class="image-upload">
        </div>


        <div class="form-group">
            <label for="post_tags">Post Tags</label>
            <input type="text" name="post_tags" class="form-control form-input">
        </div>


        <div class="form-group">
            <label for="post_content">Post Content</label>
            <textarea name="post_content" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
        </div>

    </form>
</div>
