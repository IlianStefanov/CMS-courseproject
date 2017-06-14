<?php include "db.php"; ?>
<?php session_start(); ?>

<?php 
	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$username = mysqli_real_escape_string($connection, $username);
		$password = mysqli_real_escape_string($connection, $password);
		$query_login = "SELECT * FROM users WHERE username = '{$username}' ";
		$query_login_result = mysqli_query($connection, $query_login);

		while ($row = mysqli_fetch_array($query_login_result)) {
		    $db_user_id = $row['user_id'];
		    $db_username = $row['username'];
		    $db_user_password = $row['user_password'];
		    $db_user_firstname = $row['user_firstname'];
		    $db_user_lastname = $row['user_lastname'];
		    $db_user_role = $row['user_role'];
		}
    }	
?>