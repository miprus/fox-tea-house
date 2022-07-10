<?php
		function redirectLocation($valMsg, $status){
			if(isset($_POST['btn_register']) && $status == 'error'){
				header('Location:../register_page.php?' . $status . '=' . $valMsg);
				exit;

			} elseif (isset($_POST['btn_register']) && $status == 'success'){
				header('Location:../login_page.php?' . $status . '=' . $valMsg);
				exit;
			}
			
			if(isset($_POST['btn_admin_register'])){
				header('Location:../admin_panel.php?' . $status . '=' . $valMsg . '#Add_New_Admin');
				exit;
			}
		}

	require_once '../php/config/session_start.php';
	require_once '../php/config/db_con.php';
	
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['first_name'], $_POST['surname'], $_POST['email'], $_POST['username'], $_POST['password'], $_POST['passwordRe']
    )){

    $firstName = $_POST['first_name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordRe = $_POST['passwordRe'];

    if($password == $passwordRe){
        $query_username = "SELECT * FROM users WHERE username = '$username'";
		$sql_username = mysqli_query($con, $query_username);
		
        if(mysqli_num_rows($sql_username) > 0){
			$status = 'error';
			$valMsg = 'Username aleready exists';
			redirectLocation($valMsg, $status);
			
        } else {
			$query_newAddress = "INSERT INTO addresses (country, city, address, post_code) VALUES ('empty', 'empty', 'empty', 'empty')";
			mysqli_query($con, $query_newAddress);

			$query_address = "SELECT addressID FROM addresses ORDER BY addressID DESC LIMIT 1;";
			$addressID = mysqli_fetch_array(mysqli_query($con, $query_address), MYSQLI_ASSOC);

            $addressID = $addressID['addressID'];

            $query_newUser = "INSERT INTO users (addressID, username, pass, name, surname, email) VALUES ('$addressID', '$username', '$password', '$firstName', '$surname', '$email')";
			mysqli_query($con, $query_newUser);

			$status = 'success';
			$valMsg = 'Registration completed';
			
			if(isset($_POST['btn_admin_register'])){
				$status = 'success';
				$valMsg .= '. New admin with username: "' . $username . '" was added';
				redirectLocation($valMsg, $status);
				exit;

			} else {

				redirectLocation($valMsg, $status);
				exit;
			}
		}
		
    } else {
		$status = 'error';
		$valMsg = 'Passwords do not match';
		redirectLocation($valMsg, $status);
		exit;
	}
}
?>