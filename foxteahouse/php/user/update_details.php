<?php
	require_once '../config/session_start.php';
	require_once '../config/db_con.php';

	if(isset($_POST['user_details']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
		$username = $_POST['username'];
		$firstName = $_POST['first_name'];
		$surname = $_POST['surname'];
		$email = $_POST['email'];

		$query_updateDetails = "UPDATE users SET username = '$username', name ='$firstName', surname = '$surname', email = '$email' WHERE userID = '$userID'";

		if(mysqli_query($con, $query_updateDetails)){
			$valMsg = 'Your details have been updated';
			header('Location:../../profile.php?heading=profile&success=' . $valMsg . '#personal_list');
			exit;

		} else {
			$valMsg = 'Something went wrong... failed to update your details...';
			header('Location:../../profile.php?heading=profile&error=' . $valMsg . '#personal_list');
			exit;
		}
		
	} else {
		$valMsg = 'Something went wrong...';
		header('Location:../../profile.php?heading=profile&error=' . $valMsg . '#personal_list');
		exit;
	}
?>