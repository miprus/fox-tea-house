<?php
	require_once '../php/config/session_start.php';
	require_once '../php/config/db_con.php';
	

	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$query_username = "SELECT * FROM users WHERE username = '$username'";
		$sql_username = mysqli_query($con, $query_username);

		$query_password = "SELECT * FROM users WHERE pass = '$password'";
		$sql_password = mysqli_query($con, $query_password);
		$rowUser = mysqli_fetch_array($sql_username, MYSQLI_ASSOC);

			if((mysqli_num_rows($sql_username) == 1 && mysqli_num_rows($sql_password) >= 1)){
				$userID = $rowUser['userID'];
				$_SESSION['username'] = $username;
				$_SESSION['userID'] = $userID;
				
				require_once '../php/config/cookie_set_tags.php';

				if((strpos($username, 'admin@') !== false) && (mysqli_num_rows($sql_username) == 1)){
					$_SESSION['member'] = "admin";
			
					header('Location:../index.php');
					exit;

				} else {
					$_SESSION['member'] = "member";

					header('Location:../index.php');
					exit;
				}
			} else {
				$valMsg = 'Wrong username or password';

				header('Location:../login_page.php?error=' . $valMsg);
				exit;
			}
		};
?>

