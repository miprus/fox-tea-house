<?php
	require_once '../php/config/session_start.php';
	require_once '../php/config/db_con.php';

	if($_SERVER['REQUEST_METHOD'] === 'POST'){

///////////////update user's personal details///////////////////
		if(isset($_POST['user_details'])){
			$username = $_POST['username'];
			$firstName = $_POST['first_name'];
			$surname = $_POST['surname'];
			$email = $_POST['email'];

			$query_updateDetails = "UPDATE users SET username = '$username', name ='$firstName', surname = '$surname', email = '$email' WHERE userID = '$userID'";

			if(mysqli_query($con, $query_updateDetails)){
				$valMsg = 'Your details have been updated';
				header('Location:../profile.php?heading=profile&success=' . $valMsg);
				exit;

			} else {
				$valMsg = 'Something went wrong... failed to update your details...';
				header('Location:../profile.php?heading=profile&error=' . $valMsg);
				exit;
			}
		}

///////////////change user's password///////////////////
		if(isset($_POST['user_password'])){
			$password = $_POST['password'];
			$passwordRe = $_POST['passwordRe'];

			if($password == $passwordRe){
				$query_updatePass = "UPDATE users SET pass = '$password' WHERE userID = '$userID'";

				if(mysqli_query($con, $query_updatePass)){
					$valMsg = 'Your password have been changed';
					header('Location:../profile.php?heading=profile&success=' . $valMsg);
					exit;

				} else {
					$valMsg = 'Something went wrong... failed to change your password...';
					header('Location:../profile.php?heading=profile&error=' . $valMsg);
					exit;
				} 
			
			} else {
				$valMsg = 'Passwords do not match';
				header('Location:../profile.php?heading=profile&error=' . $valMsg);
				exit;
			} 
		}

////////////////////update user's address details///////////////
		if(isset($_POST['user_address'])){
			$country = $_POST['country'];
			$city = $_POST['city'];
			$address = $_POST['address'];
			$post_code = $_POST['post_code'];

			$query_updateAddress = "UPDATE addresses a, users u SET a.country = '$country', a.city ='$city', a.address = '$address', a.post_code = '$post_code' WHERE a.addressID = u.addressID AND userID = '$userID'";

			if(mysqli_query($con, $query_updateAddress)){
				$valMsg = 'Your address details have been updated';
				header('Location:../profile.php?heading=profile&success=' . $valMsg);
				exit;

			} else {
				$valMsg = 'Something went wrong... failed to update your address details...';
				header('Location:../profile.php?heading=profile&error=' . $valMsg);
				exit;
			}
		}
	} else {
		$valMsg = 'Something went wrong...';
		header('Location:../profile.php?heading=profile&error=' . $valMsg);
		exit;
	}
?>