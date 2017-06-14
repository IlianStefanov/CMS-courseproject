<?php add_post_alert(); ?>
<div class="col-xs-12 col-md-12 col-lg-12">
	<form action="" method="post" enctype="multipart/form-data">
	
		<div class="form-group">
			<label for="title">Post Title</label>
			<input type="text" name="title" class="form-control input_field">
		</div>
		
		<div class="form-group">
			<select name="post_category" id="categories">
				<?php  
					global $connection;
			        $query = "SELECT * FROM categories";
			        $select_all_categories_query = mysqli_query($connection, $query);

			        while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
				        $category_title = $row["cat_title"];
				        $cat_id = $row["cat_id"];
                ?>
                    <option value="<?php echo $cat_id; ?>"><?php echo $category_title; ?></option>
                <?php } ?>
			</select>
		</div>


		<div class="form-group">
			<label for="post_author">Post Author</label>
			<input type="text" name="post_author" class="form-control input_field">
		</div>


		<div class="form-group">

			<select name="post_status" id="post_status">
			    
                <option value="draft">Post Status</option>
                <option value="published">Publish</option>
                <option value="draft">Draft</option>

			</select>
		</div>


		<div class="form-group">
			<label for="post_image">Post Image</label>
			<input type="file" name="image" class="image-upload">
		</div>


		<div class="form-group">
			<label for="post_tags">Post Tags</label>
			<input type="text" name="post_tags" class="form-control input_field">
		</div>


		<div class="form-group">
			<label for="post_content">Post Content</label>
			<textarea name="post_content" id="" cols="30" rows="10" class="form-control input_field add_post"></textarea>
		</div>

		<div class="form-group">
			<input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
		</div>

	</form>
</div>
