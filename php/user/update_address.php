<?php
	require_once '../config/session_start.php';
	require_once '../config/db_con.php';

	if(isset($_POST['user_address']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
		$country = $_POST['country'];
		$city = $_POST['city'];
		$address = $_POST['address'];
		$post_code = $_POST['post_code'];

		$query_updateAddress = "UPDATE addresses a, users u SET a.country = '$country', a.city ='$city', a.address = '$address', a.post_code = '$post_code' WHERE a.addressID = u.addressID AND userID = '$userID'";

		if(mysqli_query($con, $query_updateAddress)){
			$valMsg = 'Your address details have been updated';
			header('Location:../../profile.php?heading=profile&success=' . $valMsg . '#address_list');
			exit;

		} else {
			$valMsg = 'Something went wrong... failed to update your address details...';
			header('Location:../../profile.php?heading=profile&error=' . $valMsg . '#address_list');
			exit;
		}
	} else {
		$valMsg = 'Something went wrong...';
		header('Location:../../profile.php?heading=profile&error=' . $valMsg . '#address_list');
		exit;
	}
?>