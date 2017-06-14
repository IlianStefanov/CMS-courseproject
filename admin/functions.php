<?php 

    function escape($string) {
        global $connection;
        $escape_string = mysqli_real_escape_string($connection, trim($string));
        return $escape_string;
    }



    // QUERY FAILED FUNCTION
    function confirmQuery($result) {
        global $connection;

        if (!$result) {
           die("QUERY FAILED" . mysqli_error($connection));
        }
    }


    // ==============================================================
    // ================= CATEGORIES FUNCTIONS START =================
    // ==============================================================
    function create_category() { 
        global $connection;
        
        if (isset($_POST['submit'])) {
        $category = $_POST['category'];

        if ($category == "" || empty($category)) {
            echo "<div class=\"alert alert-danger\" role=\"alert\">Category field can't be empty!</div>";
        } else {
            $stmt = mysqli_prepare($connection ,"INSERT INTO categories(cat_title) VALUE(?) ");
            mysqli_stmt_bind_param($stmt, 's', $category);
            mysqli_stmt_execute($stmt);
                if (!$stmt) {
                    die("QUERY FAILED " . mysqli_error($connection));
                }
            }
        }
    }

    function findAll_categories() {
        global $connection;
        $query = "SELECT * FROM categories";
        $select_all_categories_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
        $cat_title = $row["cat_title"];
        $cat_id = $row["cat_id"];

        ?>
        <tr>
            <td><?php echo $cat_id; ?></td>
            <td class="cat_title"><?php echo $cat_title; ?></td>
            <td class="del_link"><a href="categories.php?delete=<?php echo $cat_id; ?>">DELETE</a></td>
            <td class="del_link"><a href="categories.php?edit=<?php echo $cat_id; ?>">EDIT</a></td>
        </tr> 
    <?php }
    }
    
    function edit_category() {
        global $connection;
        if (isset($_GET["edit"])) {
            $cat_edit_ID = $_GET['edit'];
            $query_edit = "SELECT * FROM categories WHERE cat_id = {$cat_edit_ID}";
            $query_edit_result = mysqli_query($connection, $query_edit);
            
            while ($row = mysqli_fetch_assoc($query_edit_result)) {
                $cat_title = $row["cat_title"];
                $cat_id = $row["cat_id"];
            ?>
                <input type="text" class="form-control" placeholder="Type category name" name="category"
                value="<?php echo $cat_title; ?>">
            <?php } 
                } else { ?>
                    <input type="text" class="form-control" placeholder="Type category name" name="category">
        <?php } 
      
        if (isset($_POST['update_cat'])) {
            $the_cat_title = $_POST['category'];
            if ($the_cat_title == "" || empty($the_cat_title)) {
                echo "<div class=\"alert alert-danger\" role=\"alert\">Please select existing category!</div>";
            }
            $query_update = " UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = '{$cat_edit_ID}' ";

            $query_result_update = mysqli_query($connection, $query_update);
            if (!$query_result_update) {
                die("Query FAILED " . mysqli_error($connection));
            }   
            header("Location: categories.php");
        }
    }

    function delete_category() {
        global $connection;
        if (isset($_GET['delete'])) {
            $category_ID = $_GET['delete'];
            $query_del = "DELETE FROM categories WHERE cat_id = {$category_ID} ";
            $query_del_result = mysqli_query($connection, $query_del);
            redirection("categories.php");
        }
    }

    function category_page_view() {
        global $connection;

        if (isset($_GET['category'])) {
        	$post_category_id = $_GET['category'];
        }

        $query_post = "SELECT * FROM posts WHERE post_category_id = '{$post_category_id}'";
        $query_post_result = mysqli_query($connection, $query_post);

        if (!$query_post_result) {
            die(mysqli_error($query_post_result));
        }
        

        while ($row = mysqli_fetch_assoc($query_post_result)) {
        	$post_id = $row["post_id"];
            $post_title = $row["post_title"];
            $post_author = $row["post_author"];
            $post_image = $row["post_image"];
            $post_date = $row["post_date"];
            $post_content = $row["post_content"];
            $post_tag = $row["post_tag"];
         ?>
            <!-- POST TITLE GOES HERE -->
            <h2>
                <a href="post.php?post_det=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
            </h2>
            
            <!-- POST AUTHOR NAME GOES HERE -->
            <p class="lead">
                by <a href="index.php"><?php echo $post_author; ?></a>
            </p>
            
            <!-- POST DATE -->
            <p>
                <span class="glyphicon glyphicon-time">
                </span> <?php echo $post_date; ?></p>
            <hr>
            <!-- POST IMAGE GOES HERE -->
            <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
            <hr>
            
            <!-- POST CONTENT -->
            <p class="post_content"><?php echo $post_content ?></p>
        
            <a class="btn btn-primary rm-btn" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
            <br>
            <span class="label label-info"><?php echo $post_tag ?></span>

            <hr>
         <?php }
    }

    // ==============================================================
    // ================= CATEGORIES FUNCTIONS END ===================
    // ==============================================================




    // ==============================================================
    // =================== POST FUNCTIONS START =====================
    // ==============================================================
    function edit_post() {
    	global $connection;

    	if (isset($_GET['p_id'])) {
    		$post_ID = $_GET['p_id'];
    		$query_edit_post = "SELECT * FROM posts WHERE post_id = {$post_ID}";
    		$query_edit_post_result = mysqli_query($connection, $query_edit_post);

    		while ($row = mysqli_fetch_assoc($query_edit_post_result)) {
    			$post_category_id = $row["post_category_id"];
                $post_title_edit = $row["post_title"];
                $post_author = $row["post_author"];
				$post_image_edit = $row['post_image'];
            	$post_status_edit = $row['post_status'];
            	$post_content_edit = $row['post_content'];
            	$post_tags_edit = $row['post_tag'];

                $post_content_modified = mysqli_real_escape_string($connection,$post_content_edit);
            ?>
                <div class="form-group">
					<label for="title">Post Title</label>
					<input type="text" name="title" class="form-control input_field" value="<?php echo $post_title_edit; ?>">
				</div>
				
				<div class="form-group">
					<select name="post_category" id="categories">
					    <?php  

							global $connection;
					        $query_cat = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
					        $select_all_categories_query = mysqli_query($connection, $query);

					        while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
    					        $category_title = $row["cat_title"];
    					        $cat_id = $row["cat_id"];
                        ?>
                            <option value="<?php echo $cat_id; ?>"><?php echo $category_title; ?></option>
                            
                        <?php } ?>
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
				

<!--
				<div class="form-group">
					<label for="post_category_id">Post Category ID</label>
					<input type="text" name="post_category_id" class="form-control input_field" value="<?php echo $post_category_id; ?>">
				</div>
-->


				<div class="form-group">
					<label for="post_author">Post Author</label>
					<input type="text" name="post_author" class="form-control input_field" value="<?php echo $post_author; ?>">
				</div>


				<div class="form-group">
					<label for="post_status">Post Status</label>
					<input type="text" class="form-control input_field" name="post_status" value="<?php echo $post_status_edit; ?>">
				</div>


				<div class="form-group">
					<label for="post_image">Post Image</label>
					<div class="post_image_box">
						<img src="../images/<?php echo $post_image_edit; ?>" alt="post_image" width="250">
					</div>
					<input type="file" name="image" class="image-upload" accept="../images/<?php echo $post_image_edit; ?>">

				</div>


				<div class="form-group">
					<label for="post_tags">Post Tags</label>
					<input type="text" name="post_tags" class="form-control input_field" value="<?php echo $post_tags_edit; ?>">
				</div>


				<div class="form-group">
					<label for="post_content">Post Content</label>
					<textarea name="post_content" id="" cols="30" rows="10" class="form-control input_field"><?php echo str_replace('\r\n','</br>',$post_content_modified); ?></textarea>
				</div>
          <?php } 
          } else { ?>
            	<div class="form-group">
					<label for="title">Post Title</label>
					<input type="text" name="title" class="form-control input_field">
				</div>


<!--
				<div class="form-group">
					<label for="post_category_id">Post Category ID</label>
					<input type="text" name="post_category_id" class="form-control input_field">
				</div>
-->


				<div class="form-group">
					<label for="post_author">Post Author</label>
					<input type="text" name="post_author" class="form-control input_field">
				</div>


				<div class="form-group">
					<label for="post_status">Post Status</label>
					<input type="text" class="form-control" name="post_status input_field">
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
					<textarea name="post_content" id="" cols="30" rows="10" class="form-control input_field"></textarea>
				</div>
          <?php } 

      		if (isset($_POST['edit_post'])) {
      		    // global $connection;
	            $post_title = $_POST['title'];
	            $post_category_id = $_POST['post_category'];
	            $post_author = $_POST['post_author'];
	            $post_status = $_POST['post_status'];
				$post_image = $_FILES['image']['name'];
	            $post_image_temp = $_FILES['image']['tmp_name'];

	            $post_tags = $_POST['post_tags'];
	            $post_content = $_POST['post_content'];
	            $post_date = date("d-m-y");
	            $post_comment_count = 4; 

        		move_uploaded_file($post_image_temp, "../images/$post_image"); 

                if (empty($post_image)) {
                    $query = "SELECT * FROM posts WHERE post_id = '{$post_ID}' ";
                    $select_image = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_array($select_image)) {
                        $post_image = $row['post_image'];
                    }
                }


			    $query_edit_post = "UPDATE posts SET ";
	            $query_edit_post .= "post_category_id = '{$post_category_id}', ";
	            $query_edit_post .= "post_title = '{$post_title}', ";
			    $query_edit_post .= "post_author = '{$post_author}', ";
	   			$query_edit_post .= "post_date = now(), ";
	            $query_edit_post .= "post_image = '{$post_image}', ";
	            $query_edit_post .= "post_content = '{$post_content}', ";
	            $query_edit_post .= "post_tag = '{$post_tags}', ";
	            $query_edit_post .= "post_status = '{$post_status}' ";
				$query_edit_post .= "WHERE post_id = '{$post_ID}' ";

            	$query_edit_post_result = mysqli_query($connection, $query_edit_post);

	            confirmQuery($query_edit_post_result);
                
                
                }
		}
    
    function list_all_posts_admin() {
        global $connection;
        $query_posts = "SELECT * FROM posts";
        $select_all_posts_query = mysqli_query($connection, $query_posts);

        while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
            $post_title = $row["post_title"];
            $post_category_id = $row["post_category_id"];
            $post_id = $row["post_id"];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            $post_tags = $row['post_tag'];
            $post_status = $row['post_status'];
//            $post_comment_count = $row['post_comment_count'];
            $post_views_count = $row['post_views_count'];
        ?>
        <tr>
            <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="<?php echo $post_id; ?>"></td>
            <td class="id_box"><?php echo $post_id; ?></td>
            <td><a href="../post.php?post_det=<?php echo $post_id;?>"><?php echo $post_title; ?></a></td>
            <td><?php echo $post_author; ?></td>

            <td><?php echo $post_date; ?></td>
            <td><img src="../images/<?php echo $post_image; ?>" class="post_image"></td>

            <td><p class="post_content"><?php echo $post_tags; ?></p></td>
            
            <?php 
                $query_category_id = "SELECT * FROM categories WHERE cat_id = '{$post_category_id}' ";
                $category_id_result_query = mysqli_query($connection, $query_category_id);

                while ($row = mysqli_fetch_assoc($category_id_result_query)) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                ?>

                <td><?php echo $cat_title; ?></td>

            <?php } ?>

            
            <?php 
                $query_post_comment_count = "SELECT * FROM comments WHERE comment_post_id = '{$post_id}'";
                $query_post_comment_count_result = mysqli_query($connection, $query_post_comment_count);
            
                $comment_count = mysqli_num_rows($query_post_comment_count_result);
            ?>
            
            <td><a href="posts.php?source=post_comments&pc_id=<?php echo $post_id; ?>"><?php echo $comment_count; ?></a></td>
            <td><?php echo $post_status; ?></td>
            <td><a href="posts.php?reset=<?php echo $post_id; ?>"><?php echo $post_views_count; ?></a></td>
<!--        	<td><a href="posts.php?delete=<?php echo $post_id; ?>" class="table-link-delete">Delete</a></td>-->
           <td><a rel="<?php echo $post_id; ?>" href="javascript:void(0)" class="table-link-delete">Delete</a></td>
           
           
        	<td><a href="posts.php?source=edit_post&p_id=<?php echo $post_id; ?>" class="table-link-edit">Edit</a></td>
        	
        </tr> 
  <?php }
    }

	function post_details() {
    	if (isset($_GET['post_det'])) {
    		global $connection;
            $post_det = $_GET['post_det'];
            $query_post_det = "SELECT * FROM posts WHERE post_id = '{$post_det}'"; 
            $query_post_det_result = mysqli_query($connection, $query_post_det);
            
            $views_query = "UPDATE posts SET post_views_count = post_views_count + 1 WHERE post_id = '{$post_det}'";
            $views_query_result = mysqli_query($connection, $views_query);
            confirmQuery($views_query_result);

            confirmQuery($query_post_det_result);

            while ($row = mysqli_fetch_assoc($query_post_det_result)) {
                $post_det_id = $row["post_category_id"];
                $post_title_det = $row["post_title"];
                $post_author_det = $row["post_author"];
                $post_image_det = $row['post_image'];
                $post_status_det = $row['post_status'];
                $post_content_det = $row['post_content'];
                $post_tags_det = $row['post_tag'];
                $post_date_det = $row['post_date'];
             ?>
                <h2 class="header-post">
                    <!-- <a href="post.php?post_det=<?php echo $post_id; ?>"><?php echo $post_title_det; ?></a> -->
                    <?php echo $post_title_det; ?>
                </h2>
                
                <!-- POST AUTHOR NAME GOES HERE -->
                <p class="lead author">
                    by <a href="index.php"><?php echo $post_author_det; ?></a>
                </p>
                
                <!-- POST DATE -->
                <p class="post-date">
                    <span class="glyphicon glyphicon-time">
                    </span> <?php echo $post_date_det; ?></p>
                <hr>
                <!-- POST IMAGE GOES HERE -->
                <img class="img-responsive post_img" src="images/<?php echo $post_image_det; ?>" alt="">
                <hr>
                
                <!-- POST CONTENT -->
                <div class="post_content"><?php echo $post_content_det; ?></div>
            
                
                <br>
                <span class="label label-info"><?php echo $post_tags_det; ?></span>
                <hr>
      <?php } 
		} 
    }

    function showAllPosts_blog() {
        global $connection;
        
        if(isset($_GET['page'])) {
             $page = $_GET['page']; 
                    
        } else {
            $page = "";
        }


        if($page == "" || $page == 1) {
            $page_1 = 0;
        } else {
            $page_1 = ($page * 5) - 5;
        }
        
        $post_query_count = "SELECT * FROM posts";
        $find_count = mysqli_query($connection, $post_query_count);
        $count = mysqli_num_rows($find_count);
        $count = $count / 5;
        
        $query_post = "SELECT * FROM posts WHERE post_status = 'published' LIMIT $page_1, 5";
        $query_post_result = mysqli_query($connection, $query_post);

        if (!$query_post_result) {
            die(mysqli_error($query_post_result));
        }
        
        

        while ($row = mysqli_fetch_assoc($query_post_result)) {
        	$post_id = $row["post_id"];
            $post_title = $row["post_title"];
            $post_author = $row["post_author"];
            $post_image = $row["post_image"];
            $post_date = $row["post_date"];
            $post_content = $row["post_content"];
            $post_tag = $row["post_tag"];
            $post_status = $row['post_status'];
            if ($post_status == "published") {
            //substr($row["post_content"], 0, 700);	
            ?>


            <!-- POST TITLE GOES HERE -->
            <div class="post_wrapper wow fadeIn">
                <div class="header-post-wrapper">
	                <h2 class="header-post">
	                    <a href="post.php?post_det=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
	                </h2>
	                
	                <!-- POST AUTHOR NAME GOES HERE -->
	                <p class="lead author">
	                    by <a href="index.php"><?php echo $post_author; ?></a>
	                </p>
	                
	                <!-- POST DATE -->
	                <p class="post-date">
	                    <span class="glyphicon glyphicon-time">
	                    </span> <?php echo $post_date; ?>
	                </p>
                </div>

                <hr>
                <!-- POST IMAGE GOES HERE -->
                <a href="post.php?post_det=<?php echo $post_id; ?>">
                <img class="img-responsive post_img" src="images/<?php echo $post_image; ?>" alt="">
                </a>
                <hr>
                
                <!-- POST CONTENT -->
                <div class="post_content ellipsis"><?php echo $post_content; ?> ...</div>
            
                <a class="btn btn-primary rm-btn" href="post.php?post_det=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <br>
                <span class="label label-info"><?php echo $post_tag ?></span>
            </div>
           
         <?php } 
     	}
    }

    function delete_post() {
    	global $connection; 
    	if (isset($_GET['delete'])) {
        	$post_ID = $_GET['delete'];
        	$query_del_post = "DELETE FROM posts WHERE post_id = {$post_ID}";
        	$query_del_result = mysqli_query($connection, $query_del_post);

    	}
    }
    
    function reset_views() {
    	global $connection; 
    	if (isset($_GET['reset'])) {
        	$post_ID = $_GET['reset'];
        	$query_del_post = "UPDATE posts SET post_views_count = 0 WHERE post_id = '{$post_ID}' ";
        	$query_del_result = mysqli_query($connection, $query_del_post);
        }
    }
    

    function search_posts() {
        global $connection;
        if (isset($_POST['submit'])) {
        $search = $_POST['search'];
        // echo $search;

        $query_search = "SELECT * FROM posts WHERE post_tag LIKE '%$search%' ";
        $query_search_result = mysqli_query($connection, $query_search);

        if (!$query_search_result) {
            die("QUERY FAILED" . mysqli_error($connection));
        }

        $count = mysqli_num_rows($query_search_result);
        if ($count == 0) {
            echo "<div class=\"alert_noPosts\">NO RESULT
                <p>Unfortunately there were no matches between our data base and your search</p>
            </div>";
            
        } else {  
            while ($row = mysqli_fetch_assoc($query_search_result)) {
                    $post_title = $row["post_title"];
                    $post_author = $row["post_author"];
                    $post_image = $row["post_image"];
                    $post_date = $row["post_date"];
                    $post_content = $row["post_content"];
                    $post_tag = $row["post_tag"];
                ?>
                <!-- POST TITLE GOES HERE -->
                <div class="post_wrapper wow fadeIn">
                    <div class="header-post-wrapper">
                        <h2 class="header-post">
                            <a href="post.php?post_det=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                        </h2>

                        <!-- POST AUTHOR NAME GOES HERE -->
                        <p class="lead author">
                            by <a href="index.php"><?php echo $post_author; ?></a>
                        </p>

                        <!-- POST DATE -->
                        <p class="post-date">
                            <span class="glyphicon glyphicon-time">
                            </span> <?php echo $post_date; ?>
                        </p>
                    </div>

                    <hr>
                    <!-- POST IMAGE GOES HERE -->
                    <a href="post.php?post_det=<?php echo $post_id; ?>">
                    <img class="img-responsive post_img" src="images/<?php echo $post_image; ?>" alt="">
                    </a>
                    <hr>

                    <!-- POST CONTENT -->
                    <div class="post_content ellipsis"><?php echo $post_content; ?> ...</div>

                    <a class="btn btn-primary rm-btn" href="post.php?post_det=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <br>
                    <span class="label label-info"><?php echo $post_tag ?></span>
                </div>

                <hr>
        <?php } 
           }
       }
    }

    function makeNewPost() {
        global $connection;
        if (isset($_POST['create_post'])) {
            $post_title = escape($_POST['title']);
            $post_category_id = escape($_POST['post_category']);
            $post_author = escape($_POST['post_author']);
            $post_status = escape($_POST['post_status']);

            $post_image = $_FILES['image']['name'];
            $post_image_temp = $_FILES['image']['tmp_name'];

            $post_tags = escape($_POST['post_tags']);
            $post_content = escape($_POST['post_content']);
            $post_date = date("d-m-y");
            $post_comment_count = 0; 

            move_uploaded_file($post_image_temp, "../images/$post_image"); 

            $query_add_post = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tag, post_comment_count, post_status) ";
            $query_add_post .= "VALUES({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_comment_count}','{$post_status}')";

            $query_add_post_result = mysqli_query($connection, $query_add_post);

            if (!$query_add_post_result) {
                die("QUERY FAILED " . mysqli_error($connection));
            }

            // echo "
            // <div class=\"success_popup alert alert-success\">
            // <strong>Success!</strong> You have successfuly added a post!
            // </div>";
            echo "<script> 
                $(document).ready(function() {
                    
                    sweetAlert(\"Thanks!\", \"for the comment\", \"success\", {
                        title: \"Auto close alert!\",
                        text: \"I will close in 2 seconds.\",
                        timer: 2000,
                        showConfirmButton: true
                    });
                    
                });
                </script>";
 
        }
    }

    // ==============================================================
    // =================== POST FUNCTIONS END =======================
    // ==============================================================



    // ==============================================================
    // ====================== ALERTS START ==========================
    // ==============================================================
    function edit_post_alert() {
        if (isset($_POST['edit_post'])) {
            echo "
                <div class=\"success_popup alert alert-success\">
                  <strong>Success!</strong> You have successfully edited the post! <a href='posts.php'>View all posts!</a>.
                </div>
            ";
        }
    }
    function submit_comment_alert() {
        if (isset($_POST['comment'])) {
//            $comment_author = $_POST['name'];
            $comment_email = escape($_POST['email']);
            $comment_content = escape($_POST['comment']);
            if(!empty($comment_content)) {
                //echo " // POPUP 1
                //<div class=\"success_popup alert alert-success\">
                //<strong>Success!</strong> Indicates a successful or positive action.
                //</div>";
                echo "<script> 
                $(document).ready(function() {
                    
                    sweetAlert(\"Thanks!\", \"for the comment\", \"success\", {
                        title: \"Auto close alert!\",
                        text: \"I will close in 2 seconds.\",
                        timer: 2000,
                        showConfirmButton: true
                    });
                    
                });
                </script>";
                
            } else {
                // echo "<div class=\"error_popup alert alert-warning\"> // POPUP 1
                // <strong>Warning!</strong> Your are not allowed to submit empty comment.
                // </div>";
                echo "<script> 
                $(document).ready(function() {
                
                    sweetAlert(\"You can't submit an empty comment!\");
                    
                });
                </script>";
            }
            
        }
    }
    function register_user_alert() {
        if (isset($_POST['reg'])) {
            
            $username_text = escape($_POST['username_text']);
            $user_password_field = escape($_POST['user_password_field']);
            
            $user_email_field = escape($_POST['user_email_field']);
           	$user_role_field = escape("subscriber");
            $user_image_field = $_FILES['user_image_field']['name'];
            $user_image_temp_field = $_FILES['user_image_field']['tmp_name'];
            

            move_uploaded_file($user_image_temp_field, "images/userImages/{$user_image_field}"); 

            
            if(!empty($username_text) && !empty($user_password_field) &&
               !empty($user_email_field)) {
                
                echo "<script> 
                $(document).ready(function() {
                    
                    sweetAlert({
                    title: \"Congratultions!\",
                    text: \"You have successfully made a registration\",

                    showConfirmButton: false,
                    timer: 2000
                });
            });
                </script>";
            } else {
                echo "<script> 
                    $(document).ready(function() {

                        sweetAlert(\"Please!\", \"Don't leave empty inputs, they are here for a reason\", \"warning\");

                    });
                </script>";
            }
        }
    }
    function login_user_success_slert() {
        if(isset($_SESSION['username'])) {
             echo "<script> 
                $(document).ready(function() {
                    
                    sweetAlert({
                    title: \"Congratultions!\",
                    text: \"You have successfully made a registration\",

                    showConfirmButton: false,
                    timer: 2000
                });
            });
                </script>";
        }
    }
    function add_post_alert() {
        if (isset($_POST['create_post'])) {
            $post_title = $_POST['title'];
            $post_category_id = $_POST['post_category'];
            $post_author = $_POST['post_author'];
            $post_status = $_POST['post_status'];

            $post_image = $_FILES['image']['name'];
            $post_image_temp = $_FILES['image']['tmp_name'];

            $post_tags = $_POST['post_tags'];
            $post_content = $_POST['post_content'];
            
            if(!empty($post_title) && !empty($post_author) &&
               !empty($post_status) && !empty($post_image) &&
               !empty($post_tags) && !empty($post_content)) {
                
                echo "<script> 
                $(document).ready(function() {
                    
                    sweetAlert({
                    title: \"Congratultions!\",
                    text: \"You have successfully added a post\",

                    showConfirmButton: false,
                    timer: 2000 },
                    function(){
                        window.location.href = 'posts.php';
                    
                });
            });
                </script>";
            } else {
                echo "<script> 
                    $(document).ready(function() {

                        sweetAlert(\"Please!\", \"Don't leave empty inputs, they are here for a reason\", \"warning\");

                    });
                </script>";
            }
        }
    }
    
    // ==============================================================
    // ====================== ALERTS START ==========================
    // ==============================================================



	// ==============================================================
    // ================ COMMENTS FUNCTIONS START ====================
    // ==============================================================

    function make_comment() {
        global $connection;
        if (isset($_POST['comment'])) {
            $post_det_id = $_GET['post_det'];
           
            if(isset($_SESSION['username'])) {
                $comment_author = $_SESSION['username'];
            } 
            
            if(isset($_SESSION['image'])) {
                $comment_image = $_SESSION['image'];
            } 
            
            $comment_email = $_POST['email'];
            $comment_content = $_POST['comment'];
           
            if(!empty($comment_author) && !empty($comment_content)) {
                $query_comment = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date, comment_image)";
                $query_comment .= "VALUES ('{$post_det_id}', '{$comment_author}' ,'{$comment_email}', '{$comment_content}', 'unapproved' , now(), '{$comment_image}')";

                $query_add_comment_result = mysqli_query($connection, $query_comment);

                confirmQuery($query_add_comment_result);
                
                $query_comment_count = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = '{$post_det_id}' ";
                $query_comment_count_result = mysqli_query($connection, $query_comment_count);
                confirmQuery($query_comment_count_result); 
            } 
        }
    }


    function delete_comment() {
        global $connection; 
        if (isset($_GET['delete'])) {
            $comment_ID = $_GET['delete'];
            $query_del_comment = "DELETE FROM comments WHERE comment_id = {$comment_ID}";
            $query_del_comment_result = mysqli_query($connection, $query_del_comment);
            confirmQuery($query_del_comment_result);
        }
    }

	//ADMIN PANEL
    function unapprove_comment() {
        global $connection;
        if (isset($_GET['unapprove'])) {
            $comment_id_status_un = $_GET['unapprove'];

            $query_comment_status_un = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = '{$comment_id_status_un}' ";
            $query_comment_status_un_result = mysqli_query($connection, $query_comment_status_un);

            confirmQuery($query_comment_status_un_result);
     
        }
    }

    //ADMIN PANEL
    function approve_comment() {
        global $connection;
        if (isset($_GET['approve'])) {
            $comment_id_status = $_GET['approve'];

            $query_comment_status = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = '{$comment_id_status}' ";
            $query_comment_status_result = mysqli_query($connection, $query_comment_status);
            confirmQuery($query_comment_status_result);
        }
    }

    //ADMIN PANEL
    function list_all_comments_admin() {
        global $connection;
        $query_comment = "SELECT * FROM comments";
        $select_all_comments_query = mysqli_query($connection, $query_comment);

        while ($row = mysqli_fetch_assoc($select_all_comments_query)) {
            $comment_id = $row["comment_id"];
            $comment_post_id = $row["comment_post_id"];
            $comment_author = $row['comment_author'];
            $comment_email = $row['comment_email'];
            $comment_content = $row['comment_content'];
            $comment_status = $row['comment_status'];
            $comment_date = $row['comment_date'];
        ?>
        <tr>
            <td class="id_box"><?php echo $comment_id; ?></td>
            <td><?php echo $comment_post_id; ?></td>
            <td><?php echo $comment_author; ?></td>
            <td><?php echo $comment_email; ?></td>
            <td><p class="post_content"><?php echo $comment_content; ?></p></td>
            <td><?php echo $comment_status; ?></td>
            <td><?php echo $comment_date; ?></td>
            <?php 
                $query_comment_id = "SELECT * FROM posts WHERE post_id = '{$comment_post_id}' ";
                $query_comment_post_id_result = mysqli_query($connection, $query_comment_id);
            
                while ($row = mysqli_fetch_assoc($query_comment_post_id_result)) {
                   $post_id = $row['post_id'];
                   $post_title = $row['post_title'];
                ?>
            
                <td><a href="../post.php?post_det=<?php echo $post_id; ?>"><?php echo $post_title; ?></a></td> 
            
            <?php } ?>            

        	<td><a href="comments.php?delete=<?php echo $comment_id; ?>" class="table-link-delete">Delete</a></td>
        	

            <td><a href="comments.php?approve=<?php echo $comment_id; ?>" class="table-link-delete">Approve</a></td>

            <td><a href="comments.php?unapprove=<?php echo $comment_id; ?>" class="table-link-edit">Unapprove</a></td>
        </tr> 
  <?php }
    }

    function list_all_comments_specific_post() {
            global $connection;
        if(isset($_GET['pc_id'])) {
            $specific_post_comments = $_GET['pc_id'];
        }
        $query_comment_post = "SELECT * FROM comments WHERE comment_post_id = '{$specific_post_comments}' ";
        $select_post_comments_query = mysqli_query($connection, $query_comment_post);

        while ($row = mysqli_fetch_assoc($select_post_comments_query)) {
            $comment_id = $row["comment_id"];
            $comment_post_id = $row["comment_post_id"];
            $comment_author = $row['comment_author'];
            $comment_email = $row['comment_email'];
            $comment_content = $row['comment_content'];
            $comment_status = $row['comment_status'];
            $comment_date = $row['comment_date'];
        ?>
        <tr>
            <td class="id_box"><?php echo $comment_id; ?></td>
            <td><?php echo $comment_post_id; ?></td>
            <td><?php echo $comment_author; ?></td>
            <td><?php echo $comment_email; ?></td>
            <td><p class="post_content"><?php echo $comment_content; ?></p></td>
            <td><?php echo $comment_status; ?></td>
            <td><?php echo $comment_date; ?></td>
            <?php 
                $query_comment_id = "SELECT * FROM posts WHERE post_id = '{$comment_post_id}' ";
                $query_comment_post_id_result = mysqli_query($connection, $query_comment_id);
            
                while ($row = mysqli_fetch_assoc($query_comment_post_id_result)) {
                   $post_id = $row['post_id'];
                   $post_title = $row['post_title'];
                ?>
            
                <td><a href="../post.php?post_det=<?php echo $post_id; ?>"><?php echo $post_title; ?></a></td> 
            
            <?php } ?>            

        	<td><a href="posts.php?source=post_comments&pc_id=<?php echo $specific_post_comments; ?>&delete=<?php echo $comment_id; ?>" class="table-link-delete">Delete</a></td>
        	

            <td><a href="posts.php?source=post_comments&pc_id=<?php echo $specific_post_comments; ?>&approve=<?php echo $comment_id; ?>" class="table-link-delete">Approve</a></td>

            <td><a href="posts.php?source=post_comments&pc_id=<?php echo $specific_post_comments; ?>&unapprove=<?php echo $comment_id; ?>" class="table-link-edit">Unapprove</a></td>
        </tr> 
  <?php }
    }

    function display_comment() {
        global $connection;
        $post_det_id = $_GET['post_det'];

        $query_comments_listing = "SELECT * FROM comments WHERE comment_post_id = '{$post_det_id}' AND comment_status = 'approved' ORDER BY comment_id DESC ";

        $query_comments_listing_result = mysqli_query($connection, $query_comments_listing); 

        
        while ($row = mysqli_fetch_assoc($query_comments_listing_result)) {
            $comment_author = $row['comment_author'];
            $comment_date = $row['comment_date'];
            $comment_email = $row['comment_email'];
			$comment_content = $row['comment_content'];
            $comment_image = $row['comment_image'];
             ?>
            
            
            
            <div class="media" id="single-comment">
                <a class="pull-left" href="#">
                    <img class="media-object user_profile_pic" src="images/userImages/<?php echo $comment_image; ?>" alt="">
                </a>
                <div class="media-body">
                <h4 class="media-heading"><?php echo $comment_author; ?>
                    <small><?php echo $comment_date; ?></small><br>
                </h4>
                <?php echo $comment_content; ?>
            </div>
        </div>
  <?php }
    }

    // ==============================================================
    // ================= COMMENTS FUNCTIONS END =====================
    // ==============================================================


    // ==============================================================
    // ===================== USERS SECTION START ====================
    // ==============================================================

    function list_all_users_admin() {
    	global $connection;

    	$query_list_users = "SELECT * FROM users";
    	$query_list_users_result = mysqli_query($connection, $query_list_users);

    	confirmQuery($query_list_users_result);

    	while ($row = mysqli_fetch_assoc($query_list_users_result)) {
    		$user_id = $row['user_id']; 
			$username = $row['username'];
    		$user_password = $row['user_password'];
    		$user_firstname = $row['user_firstname'];
    		$user_lastname = $row['user_lastname'];
    		$user_email = $row['user_email'];
    		$user_image = $row['user_image'];  
    		$user_role = $row['user_role']; 	

    	?>

    	<tr>
    		<td class="id_box"><?php echo $user_id; ?></td>

    		<td><?php echo $username; ?></td>

    		<td><?php echo $user_password; ?></td>

    		<td><?php echo $user_firstname; ?></td>

    		<td><?php echo $user_lastname; ?></td>

    		<td><?php echo $user_email; ?></td>

    		<td><img src="../images/userImages/<?php echo $user_image; ?>" alt="" class="user_image_admin"></td>

    		<td><?php echo $user_role;  ?></td>

    		<td><a href="users.php?delete=<?php echo $user_id; ?>" class="table-link-delete">Delete</a></td>
    		<td><a href="users.php?source=edit_user&u_id=<?php echo $user_id; ?>" class="table-link-delete">Edit</a></td>
    	</tr>

  <?php }
	}

	function register_user_admin() {
		global $connection;

		if (isset($_POST['reg'])) {
            $username_text = $_POST['username_text'];
            $user_password_field = $_POST['user_password_field'];
            $user_firstname_field = $_POST['user_firstname_field'];
            $user_lastname_field = $_POST['user_lastname_field'];
            $user_email_field = $_POST['user_email_field'];
			$user_role_field = $_POST['user_role'];
            $user_image_field = $_FILES['user_image_field']['name'];
            $user_image_temp_field = $_FILES['user_image_field']['tmp_name'];

            move_uploaded_file($user_image_temp_field, "../images/userImages/{$user_image_field}"); 
            
            
            $user_password_field = password_hash($user_password_field, PASSWORD_BCRYPT, array('cost' => 12));
            
            
//            $query_salt_admin = "SELECT randSalt FROM users";
//                $query_salt_admin_result = mysqli_query($connection, $query_salt_admin);
//
//            $row_admin = mysqli_fetch_array($query_salt_admin_result);
//            $salt_admin = $row_admin['randSalt'];
//                
//            $user_password_field = crypt($user_password_field, $salt_admin);
            

            $query_add_user = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email, user_image, user_role) ";
            $query_add_user .= "VALUES('{$username_text}', '{$user_password_field}', '{$user_firstname_field}', '{$user_lastname_field}', '{$user_email_field}', '{$user_image_field}', '{$user_role_field}') ";

            $query_add_user_result = mysqli_query($connection, $query_add_user);

            confirmQuery($query_add_user_result);
            
            header("Location: users.php");
		}
	}

	function register_user_index() {
		global $connection;

		if (isset($_POST['reg'])) {
            
            $username_text = $_POST['username_text'];
            $user_password_field = $_POST['user_password_field'];
            $user_email_field = $_POST['user_email_field'];
           	$user_role_field = "subscriber";
            $user_image_field = $_FILES['user_image_field']['name'];
            $user_image_temp_field = $_FILES['user_image_field']['tmp_name'];
            
            $username_text = mysqli_real_escape_string($connection, $username_text);
            $user_password_field = mysqli_real_escape_string($connection, $user_password_field);
            $user_email_field = mysqli_real_escape_string($connection, $user_email_field);
                
                
            move_uploaded_file($user_image_temp_field, "images/userImages/{$user_image_field}"); 

            $user_password_field = password_hash($user_password_field, PASSWORD_BCRYPT, array('cost' => 12));
            
            
//            $query_salt = "SELECT randSalt FROM users";
//            $query_salt_result = mysqli_query($connection, $query_salt);
//
//            $row = mysqli_fetch_array($query_salt_result);
//            $salt = $row['randSalt'];
//                
//            $user_password_field = crypt($user_password_field, $salt);
            
            if(!empty($username_text) && !empty($user_password_field) &&
               !empty($user_email_field)) {
                
                $query_add_user = "INSERT INTO users(username, user_password,  user_email, user_image, user_role) ";
                $query_add_user .= "VALUES('{$username_text}', '{$user_password_field}', '{$user_email_field}', '{$user_image_field}', '{$user_role_field}') ";

                $query_add_user_result = mysqli_query($connection, $query_add_user);

                confirmQuery($query_add_user_result);
            }
        }
	}

	function delete_user() {
		global $connection; 
        
    	if (isset($_GET['delete'])) {
            if(isset($_SESSION['user_role'])) {
                if($_SESSION['user_role'] == 'admin') {
                    $user_ID = escape($_GET['delete']);
                    $query_del_user = "DELETE FROM users WHERE user_id = {$user_ID}";
                    $query_del_result = mysqli_query($connection, $query_del_user);
                }
            }
        }
	}

	function edit_user() {
    	global $connection;

    	if (isset($_GET['u_id'])) {
    		$user_ID = $_GET['u_id'];
    		$query_edit_user = "SELECT * FROM users WHERE user_id = {$user_ID}";
    		$query_edit_user_result = mysqli_query($connection, $query_edit_user);

    		while ($row = mysqli_fetch_assoc($query_edit_user_result)) {
    			$user_id = $row['user_id']; 
				$username = $row['username'];
	    		$user_password = $row['user_password'];
	    		$user_firstname = $row['user_firstname'];
	    		$user_lastname = $row['user_lastname'];
	    		$user_email = $row['user_email'];
	    		$user_image = $row['user_image'];  
	    		$user_role = $row['user_role']; 

                
            ?>
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
		                  <?php }
							?>
		            </select>
				</div>

				<div class="form-group">
					<label for="user_image_field">Post Image</label>
					<div class="post_image_box">
						<img src="../images/userImages/<?php echo $user_image; ?>" alt="post_image" width="150">
					</div>
					<input type="file" name="user_image_field" class="image-upload" accept="../images/userImages/<?php echo $user_image; ?>">
				</div>
          <?php } 
          } else { ?>
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
          <?php } 

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
                
                
//                $query_salt_edit = "SELECT randSalt FROM users";
//                $query_salt_edit_result = mysqli_query($connection, $query_salt_edit);
//
//                $row_edit = mysqli_fetch_array($query_salt_edit_result);
//                $salt_edit = $row_edit['randSalt'];
//
//                $user_password_field = crypt($user_password_field, $salt_edit);
                
                
                if(!empty($user_password_field)) {
                    
                    $query_password ="SELECT user_password FROM users WHERE user_id = '{$user_ID}'";
                    
                    $get_user = mysqli_query($connection, $query_password);
                    confirmQuery($get_user);
                    
                    $row = mysqli_fetch_array($get_user);
                    
                    $db_user_password = $row['user_password'];
                    
                     if($db_user_password != $user_password_field) {
                        $hashed_password = password_hash($user_password_field, PASSWORD_BCRYPT, array('cost' => 12));
                    }
                    
                    if (empty($user_image_field)) {
                    $query = "SELECT * FROM users WHERE user_id = '{$user_ID}' ";
                    $select_image = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_array($select_image)) {
                            $user_image_field = $row['user_image'];
                        }
                    }

                    $query_edit_user = "UPDATE users SET ";
                    $query_edit_user .= "username = '{$username_text}', ";
                    $query_edit_user .= "user_password = '{$hashed_password}', ";
                    $query_edit_user .= "user_firstname = '{$user_firstname_field}', ";
                    $query_edit_user .= "user_lastname = '{$user_lastname_field}', ";
                    $query_edit_user .= "user_email = '{$user_email_field}', ";
                    $query_edit_user .= "user_image = '{$user_image_field}', ";
                    $query_edit_user .= "user_role = '{$user_role_field}' ";
                    $query_edit_user .= "WHERE user_id = '{$user_ID}' ";

                    $query_edit_user_result = mysqli_query($connection, $query_edit_user);

                    confirmQuery($query_edit_user_result);
                    header("Location: users.php");
                   }
             }
		}
    
    // ==============================================================
    // ====================== USERS SECTION END =====================
    // ==============================================================

    function select_Specific_Boxes() {
        global $connection; 
        if (isset($_POST['checkBoxArray'])) {
            foreach($_POST['checkBoxArray'] as $checkBoxValue_postID) {
                $bulk_options = $_POST['bulk_options'];
            
                switch($bulk_options) {
                    case 'published':
                            $query_post_update = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = '{$checkBoxValue_postID}' ";
                            
                            $query_post_update_result = mysqli_query($connection, $query_post_update);
                        
                            confirmQuery($query_post_update_result);
                        break;
                    case 'draft':
                            $query_post_draft = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = '{$checkBoxValue_postID}' "; 
                            
                            $query_post_draft_result = mysqli_query($connection, $query_post_draft);
                        
                            confirmQuery($query_post_draft_result);
                        
                        break;
                    case 'delete':
                            $query_post_delete="DELETE FROM posts WHERE post_id = '{$checkBoxValue_postID}' ";
                        
                            $query_post_delete_result = mysqli_query($connection, $query_post_delete);
                            
                            confirmQuery($query_post_delete_result);
                    
                        break;
                    case 'clone':
                            $query_clone_posts = "SELECT * FROM posts WHERE post_id = '{$checkBoxValue_postID}' ";
                        
                            $query_clone_posts_result = mysqli_query($connection, $query_clone_posts);
                        
                            while($row = mysqli_fetch_assoc($query_clone_posts_result)) {
                                $post_category_id_clone = $row["post_category_id"];
                                $post_title_clone = $row["post_title"];
                                $post_author_clone = $row["post_author"];
                                
                                $post_image_edit_clone = $row['post_image'];
                                $post_status_edit_clone = $row['post_status'];
                                $post_content_edit_clone = $row['post_content'];
                                $post_tags_edit_clone = $row['post_tag'];
                                $post_content_clone_modified = mysqli_real_escape_string($connection, $post_content_edit_clone);
                            }
                            
                    case 'delete': 

                            $query_clone_post = "INSERT INTO posts(";
                            $query_clone_post .= "post_category_id, post_title, post_author, post_date, post_image, post_content, post_tag, post_status) ";

                            $query_clone_post .= "VALUES(";
                            $query_clone_post .= "'{$post_category_id_clone}',";
                            $query_clone_post .= "'{$post_title_clone}',";
                            $query_clone_post .= "'{$post_author_clone}', ";
                            $query_clone_post .= "now(), ";
                            $query_clone_post .= "'{$post_image_edit_clone}', ";
                            $query_clone_post .= "'{$post_content_clone_modified}', ";
                            $query_clone_post .= "'{$post_tags_edit_clone}', ";
                            $query_clone_post .= "'{$post_status_edit_clone}')";

                            $query_clone_post_result = mysqli_query($connection, $query_clone_post);

                            confirmQuery($query_clone_post_result);
                        break;
                }
            }
        }
    }


    function users_online_count() {
        if(isset($_GET['onlineusers'])) {
            global $connection;
            
            if(!$connection) {
                session_start();
                include("../includes/db.php");
                
                $session = session_id();
                $time = time();
                $time_out_in_seconds = 60;
                $time_out = $time - $time_out_in_seconds;

                $query_user_online = "SELECT * FROM users_online where session = '{$session}'";

                $query_user_online_result = mysqli_query($connection, $query_user_online);

                $count_rows = mysqli_num_rows($query_user_online_result);

                if($count_rows == NULL) {
                    mysqli_query($connection, "INSERT INTO users_online(session, time) VALUES('{$session}','{$time}') ");
                } else {
                    mysqli_query($connection, "UPDATE users_online SET time = '{$time}' WHERE session = '{$session}'");
                }

                $users_online = mysqli_query($connection, "SELECT * FROM users_online WHERE time > '{$time_out}' ");

                echo $count_user = mysqli_num_rows($users_online);
                
                }
            } // get request for real time users online 
        }

        users_online_count();


        function pagination_logic() {
            global $connection;
            $post_query_count = "SELECT * FROM posts";
                $find_count = mysqli_query($connection, $post_query_count);
                $count = mysqli_num_rows($find_count);
                $count = ceil($count / 5);
                $pages = array($count); 
               
                for ($i=1;$i<=$count - 1;$i++) $pages[$i-1]='<p>page'.$i.'</p>';
                $current = $_GET['page'];
                $last = count($pages)+1;
                $curr0 = $current-2;
                $curr1 = $current+2;
                if ($curr0<=1) {
                  $curr0 = 1;
                  $curr1 = $last>5? 5 : $last;
                }
                if ($curr1>=$last) {
                  $curr0 = $last-4 < 1 ? 1 : $last-4;
                  $curr1 = $last;
                }
                // now print all links:
                ?>
                  
                    <?php if($current == 1) { ?>
                        <li></li>
            <?php   } else { ?>
                        <li class="arrows pagination-item" style="border: 0px solid black;"><a class="pagination-link" href="index.php?page=1"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
            <?php   } ?>
                    
                   
                <?php for ($i=$curr0; $i<=$curr1; $i++) {
                  $style = ($i==$current) ? 'font-weight:bold;' : '' ; ?>
                  
                  <li class="pagination-item <?php 
                    if(!isset($_GET['page'])) {header("Location: index.php?page=1"); }
                    if($_GET['page'] == $i){echo 'is-active';}?>"><a class="pagination-link" style="<?php echo $style; ?>"  href="index.php?page=<?php echo $i;?>" style="'<?php echo $style; ?>'"><?php echo $i;?></a></li>
                  
                <?php } ?>
                
                <?php 
               
                    if($current == $last) { ?>
                         
                        <li></li> 
                        
            <?php   } else { ?>
                         <li class="arrows pagination-item" style="border:0px solid black !important;"><a class="pagination-link" href="index.php?page=<?php echo $last; ?>"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>   
            <?php   }
        }

        function send_emails() {
            if(isset($_POST['send_email_button'])) {
                $to =           escape($_POST['to']);
                $subject =      escape($_POST['subject']);
                $email =        escape($_POST['receive_email']);
                $message =      escape($_POST['message']);
                
                echo $to . " ";
                echo $subject . " ";
                echo $email . " ";
                echo $message . " ";
            }
        } 




        function record_count($table_name) {
            global $connection;
            $query = "SELECT * FROM " . $table_name;
            $select = mysqli_query($connection, $query);
            
            $count = mysqli_num_rows($select);
            confirmQuery($count);
            
            return $count;
        }




        // CMS ACCESS IMPROVEMENT \m_
        // TODO: Implement Function
        function is_admin($username = '') {
            global $connection; 
            $query = "SELECT user_role FROM users WHERE username = {$username}";
            $query_result = mysqli_query($connection, $query);
            confirmQuery($query_result);
            
            $row = mysqli_fetch_array($query_result);
            
            if($row['user_role'] == 'admin') {
                
            }
        }



        function username_exists($username) {
            global $connection; 
            
            $query = "SELECT user_role FROM users WHERE username = {$username} ";
            $query_result = mysqli_query($connection, $query);
            confirmQuery($query_result);
            
            if(mysqli_num_rows($query_result) > 0) {
                
                return true;
                
            } else {
                
                return false;
                
            }
        }

        function check_db_for_user() {
            global $connection;
            if(isset($_POST['reg'])) {
                $username = $_POST['username_text'];
                $email = $_POST['user_email_field'];
                $password = $_POST['user_password_field'];
                $message = "";
                if(username_exists($username)) {
                    $message = "User already exists!";
                }
            }
            echo $message;
        }

        function redirection($location) {
            return header("Location: " . $location);
        }
?>











