<?php
	require_once '../config/session_start.php';
	require_once '../config/db_con.php';

	if(isset($_POST['user_password']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
		$password = $_POST['password'];
		$passwordRe = $_POST['passwordRe'];

		if($password == $passwordRe){
			$query_updatePass = "UPDATE users SET pass = '$password' WHERE userID = '$userID'";

			if(mysqli_query($con, $query_updatePass)){
				$valMsg = 'Your password has been changed';
				header('Location:../../profile.php?heading=profile&success=' . $valMsg . '#change_pass');
				exit;

			} else {
				$valMsg = 'Something went wrong... failed to change your password...';
				header('Location:../../profile.php?heading=profile&error=' . $valMsg) . '#change_pass';
				exit;
			} 
			
		} else {
			$valMsg = 'Passwords do not match';
			header('Location:../../profile.php?heading=profile&error=' . $valMsg . '#change_pass');
			exit;
		} 

	} else {
		$valMsg = 'Something went wrong...';
		header('Location:../../profile.php?heading=profile&error=' . $valMsg . '#change_pass');
		exit;
	}
?>