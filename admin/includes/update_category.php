<?php 
    global $connection;
       
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
        // header("Location: categories.php");
    }
?>