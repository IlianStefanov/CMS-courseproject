<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4 fixed-sidebar">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
            <div class="input-group">
                <input type="text" class="form-control" name="search">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" name="submit">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
                </span>
            </div>
            </form> <!-- search form end -->
        <!-- /.input-group -->
    </div>
    
    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                <?php 
                    global $connection;
                    $query = "SELECT * FROM categories";
                    $select_all_categories_query = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
                        $cat_title = $row["cat_title"];
                        $cat_id = $row["cat_id"];
                    ?>
                    <li>
                        <a href="category.php?category=<?php echo $cat_id; ?>"><?php echo $cat_title; ?></a>
                    </li> 
                <?php } ?>
                </ul>
            </div>
            <div class="col-lg-6">
                <ul class="list-unstyled">
                <?php 
                    global $connection;
                    $query = "SELECT * FROM categories";
                    $select_all_categories_query = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
                        $cat_title = $row["cat_title"];
                        $cat_id = $row["cat_id"];
                    ?>
                    <li>
                        <a href="category.php?category=<?php echo $cat_id; ?>"><?php echo $cat_title; ?></a>
                    </li> 
                <?php } ?>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
            <!-- <div class="col-lg-6">
                <ul class="list-unstyled">
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                </ul>
            </div> -->
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>



    <!-- Side Widget Well -->
    <?php include "widget.php"; ?>

</div>