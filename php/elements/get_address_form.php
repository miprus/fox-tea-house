<?php
	if($member_type != 'guest'){
		$query_addressCheckout = "SELECT u.*, a.* FROM users u, addresses a WHERE u.addressID = a.addressID AND u.userID = '$userID'";
		$sql_addressCheckout = mysqli_query($con, $query_addressCheckout);


		while($rowAddressCheckout = mysqli_fetch_array($sql_addressCheckout, MYSQLI_ASSOC)){
			$userID = $rowAddressCheckout['userID'];
			$firstName = $rowAddressCheckout['name'];
			$surname = $rowAddressCheckout['surname'];
			$email = $rowAddressCheckout['email'];
			$country = $rowAddressCheckout['country'];
			$city = $rowAddressCheckout['city'];
			$address = $rowAddressCheckout['address'];
			$postCode = $rowAddressCheckout['post_code'];
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

		if($postCode == 'empty'){
			$postCode = '';
		}

	} else {
		$userID = '';
		$firstName = '';
		$surname = '';
		$email = '';
		$country = '';
		$city = '';
		$address = '';
		$postCode = '';
	}

	echo('
		<form class="checkout_address validate" id="cart_form" method="POST" action="checkout.php">

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="first_name"><h5>First Name</h5></label>
					<input type="text" name="first_name" class="form-control form-control-lg" id="first_name" placeholder="Your first name" value="' . $firstName .'" required>
				</div>

				<div class="form-group col-md-6">
					<label for="surname"><h5>Surname</h5></label>
					<input type="text" name="surname" class="form-control form-control-lg" id="surname" placeholder="Your surname" value="' . $surname .'" required>
				</div>
			</div>

				<div class="form-group">
					<label for="address"><h5>Address</h5></label>
					<input type="text" name="address" class="form-control form-control-lg" id="address" placeholder="Your address, e.g Queen St 2/6" value="' . $address .'" required>
				</div>

			<div class="form-row">
				<div class="form-group col-md-5">
					<label for="country"><h5>Country</h5></label>
					<input type="text" name="country" class="form-control form-control-lg" id="country" placeholder="Your country, e.g Scotland" value="' . $country .'" required>
				</div>
				<div class="form-group col-md-5">
					<label for="city"><h5>City</h5></label>
					<input type="text" name="city" class="form-control form-control-lg" id="city" placeholder="Your city, e.g Glasgow" value="' . $city .'" required>
				</div>
				<div class="form-group col-md-2">
					<label for="post_code"><h5>Post Code</h5></label>
					<input type="text" name="post_code" class="form-control form-control-lg" id="post_code" placeholder="Your post code, e.g G1 3BJ " value="' . $postCode .'" required>
				</div>
			</div>

				<div class="form-group">
					<label for="email"><h5>Email</h5></label>
					<input type="email" name="email" class="form-control form-control-lg" id="email" placeholder="Your email" value="' . $email .'" required>
				</div>
			</div>
			
			<div class="d-flex justify-content-center cart_buttons">
				<a href="store.php" class="btn">Return to Shopping</a>
				<input type="submit" class="btn" name="to_checkout" value="Proceed to Checkout">
			</div>
		</form>
	');
?>