<?php
if($member_type != 'guest'){  
	$query_details = "SELECT * FROM users WHERE userID = '$userID'";
	$sql_details = mysqli_query($con, $query_details);

		while($row_details = mysqli_fetch_array($sql_details, MYSQLI_ASSOC)){
			$username = $row_details['username'];
			$pass = $row_details['pass'];
			$name = $row_details['name'];
			$surname = $row_details['surname'];
			$email = $row_details['email'];
		}
  
	$query_address = "SELECT a.* FROM addresses a, users u WHERE a.addressID = u.addressID AND userID = '$userID'";
	$sql_address = mysqli_query($con, $query_address);

  		while($row_address = mysqli_fetch_array($sql_address, MYSQLI_ASSOC)){
			$country = $row_address['country'];
			$city = $row_address['city'];
			$address = $row_address['address'];
			$post_code = $row_address['post_code'];
		}

		if($country == 'empty'){
			$country = '';
		}

		if($city == 'empty'){
			$city = '';
		}

		if($address == 'empty'){
			$address = '';
		}

		if($post_code == 'empty'){
			$post_code = '';
		}

	} else {
		$username = '';
		$name = '';
		$surname = '';
		$email = '';
		$country = '';
		$city = '';
		$address = '';
		$post_code = '';
	}
		echo('
		
		<section class="profile_section">
		<div class="list-group list-group-horizontal-md text-center" id="list-tab">
			<a class="list-group-item list-group-item-action active" data-toggle="list" href="#personal_list"><h4>Personal Details</h4></a>
			<a class="list-group-item list-group-item-action" data-toggle="list" href="#change_pass"><h4>Change Password</h4></a>
			<a class="list-group-item list-group-item-action" data-toggle="list" href="#address_list"><h4>Address</h4></a>
		</div>
	
		<div class="tab-content" id="nav-tabContent">
			<section class="tab-pane fade show active" id="personal_list">
				<form class="container-fluid mx-auto access_form validate" method="POST" action="php/user/update_details.php">
					');
						require 'php/config/validation_message.php';
						
						echo('

					<div class="form-group">
						<h4><label for="username_details">Username</label></h4>
						<input type="text" name="username" pattern="^[a-zA-Z0-9]*$" title="Username can\'t contain any special characters or white spaces" class="form-control form-control-lg" id="username_details" placeholder="Your username" value="' . $username. '" required>
					</div>

					<div class="form-group">
						<h4><label for="first_name_details">First Name</label></h4>
						<input type="text" name="first_name" class="form-control form-control-lg" id="first_name_details" placeholder="Your first name" value="' . $name . '" required>
					</div>

					<div class="form-group">
						<h4><label for="surname_details">Surname</label></h4>
						<input type="text" name="surname" class="form-control form-control-lg" id="surname_details" placeholder="Your surname" value="' . $surname. '" required>
					</div>

					<div class="form-group">
						<h4><label for="email_details">Email</label></h4>
						<input type="email" name="email" class="form-control form-control-lg" id="email_details" placeholder="Your email" value="' . $email. '" required>
					</div>

					<input type="submit" class="btn btn-lg" name="user_details" value="Update">
				</form>
			</section>

			<section class="tab-pane fade" id="change_pass">
				<form class="container-fluid mx-auto access_form validate" method="POST" action="php/user/update_password.php">
					');
						require 'php/config/validation_message.php';
						echo('

					<div class="form-group">
						<h4><label for="password_change">New Password</label></h4>
						<input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain at least one number, one uppercase and lowercase letter, and be at least 8 or more characters" class="form-control form-control-lg" id="password_change" placeholder="Your new password" required>
					</div>

					<div class="form-group">
						<h4><label for="passwordRe_change">Confirm New Password</label></h4>
						<input type="password" name="passwordRe" class="form-control form-control-lg" id="passwordRe_change" placeholder="Repeat new password" required>
					</div>

					<input type="submit" class="btn btn-lg" name="user_password" value="Update">
				</form>
			</section>

			<section class="tab-pane fade" id="address_list">
				<form class="container-fluid mx-auto access_form validate" method="POST" action="php/user/update_address.php">
					');
						require 'php/config/validation_message.php';
						echo('

					<div class="form-group">
						<h4><label for="country_address">Country</label></h4>
						<input type="text" name="country" class="form-control form-control-lg" id="country_address" placeholder="Your country, e.g Scotland" value="' . $country. '" required>
					</div>

					<div class="form-group">
						<h4><label for="city_address">City</label></h4>
						<input type="text" name="city" class="form-control form-control-lg" id="city_address" placeholder="Your city, e.g Glasgow" value="' . $city. '" required>
					</div>

					<div class="form-group">
						<h4><label for="address_address">Address</label></h4>
						<input type="text" name="address" class="form-control form-control-lg" id="address_address" placeholder="Your address, e.g Queen St 2/6" value="' . $address. '" required>
					</div>

					<div class="form-group">
						<h4><label for="post_code_address">Post Code</label></h4>
						<input type="text" name="post_code"  class="form-control form-control-lg" id="post_code_address" placeholder="Your post code, e.g G1 3BJ " value="' . $post_code. '" required>
					</div>

					<input type="submit" class="btn btn-lg" name="user_address" value="Update">
				</form>
			</section>
		</div>
	</section>
		
		');
?>