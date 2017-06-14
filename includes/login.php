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
            $db_user_image = $row['user_image'];
		}
    	
//        $password = crypt($password, $db_user_password);

//        if (($username == $db_username) && ($password == $db_user_password) && ($db_user_role == "admin")) 
        if(password_verify($password, $db_user_password)) {
            if($db_user_role == 'admin') {
                header("Location: ../admin");
            } else {
                header("Location: ../index.php");
            }
            
            $_SESSION['username'] = $db_username;
            $_SESSION['firstname'] = $db_user_firstname;
            $_SESSION['lastname'] = $db_user_lastname;
            $_SESSION['role'] = $db_user_role;
            $_SESSION['image'] = $db_user_image;
        
        } else {
            header("Location: ../index.php");
        }
    }
?>
<!--
else if ($username !== $db_username && $password !== $db_user_password) {
            header("Location: ../index.php");
        } else if ($username == $db_username && $password == $db_user_password && $db_user_role !== "admin") {
            $_SESSION['username'] = $db_username;
            $_SESSION['firstname'] = $db_user_firstname;
            $_SESSION['lastname'] = $db_user_lastname;
            $_SESSION['role'] = $db_user_role;
            header("Location: ../index.php");
        } -->
