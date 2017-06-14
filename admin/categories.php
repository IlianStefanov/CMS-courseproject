<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

        <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">
                            Here you can view all categories and add new ones!
                            <small>Keep on the track</small>
                        </h2>
                        

                        <div class="col-xs-12 col-md-6 col-lg-6">
                            <!-- CREATE NEW CATEGORY FUNCTION -->
                            <?php create_category(); ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="category">Adding new Category!</label>
                                    <input type="text" class="form-control" placeholder="Type category name" name="category">
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Add Category" name="submit">
                                </div>
                            </form>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-6">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="category">Edit existing Category!</label>
                                    <?php edit_category(); ?>
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Edit Category" name="update_cat">
                                </div>
                            </form>

                        </div>

                        
                        <!-- <div class="col-xs-12 col-md-12 col-lg-12"> -->
                            <table class="categories-table table table-sm table-inverse">
                                <thead>
                                    <tr>
                                      <th>ID</th>
                                      <th>Category title</th>
                                      <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php findAll_categories(); ?>

                                <?php delete_category(); ?>
                                </tbody>
                            </table>
                        <!-- </div> -->
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
