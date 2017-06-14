<?php select_Specific_Boxes(); ?>

<div class="table-responsive">

    <form action="" method="post">
        <div class="row">
            <div id="bulkOptionsContainer" class="col-xs-12 col-md-6 col-lg-6">

                <select name="bulk_options" id="" class="form-control">
                    <option value="">Select Option</option>
                    <option value="published">Publish</option>
                    <option value="draft">Draft</option>
                    <option value="delete">Delete</option>
                    <option value="clone">Clone</option>
                </select>
            </div>

            <div class="col-xs-12 col-lg-4 col-md-4 buttons_post_table">
                <input type="submit" name="submit" class="btn btn-success" value="Apply">
                <a href="posts.php?source=add_post" class="btn btn-primary">Add New</a>
            </div>
        </div>

        <table class="table table-sm table-inverse">
           
            <thead>
                <tr>
                    <th><input type="checkbox" id="selectAllBoxes"></th>
                    <th>ID</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Image</th>
                    <th>Tags</th>
                    <th>Category</th>
                    <th>Comments</th>
                    <th>Status</th>
                    <th>Views</th>
                </tr>
            </thead>

            <tbody>
                <?php delete_post(); ?>
                <?php reset_views(); ?>
                <?php list_all_posts_admin(); ?>
                <?php include "delete_modal.php"; ?>
            </tbody>
            
        </table>
    </form>
</div>


<script>
    $(document).ready(function() {
        $(".table-link-delete").on('click', function() {
            var id = $(this).attr("rel");
            var delete_url = "posts.php?delete=" + id;
            $('#myModal').modal("show");
            
            $(".delete_link").attr("href", delete_url);
        });
    });
</script>