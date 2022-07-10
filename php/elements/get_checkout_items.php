<?php
	if(isset($_POST['to_checkout'])){
		$checkoutItems = $_POST['checkoutItems'];

		$firstName = $_POST['first_name'];
		$surname = $_POST['surname'];
		$email = $_POST['email'];
		$addreess = $_POST['address'];
		$city = $_POST['city'];
		$country = $_POST['country'];
		$postCode = $_POST['post_code'];

		$totalPrice = 0;

		echo('
		<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
			<div class="row my-5">
				<div class="col-md-4 mr-3">
					<h3>Recipient Details</h3>

					<p class="d-inline font-weight-bold">First Name:</p>
					<p class="d-inline">' . $firstName . '</p>
					<input type="hidden" name="first_name" value="' . $firstName . '">
					<br>
					<p class="d-inline font-weight-bold">Surname:</p>
					<p class="d-inline">' . $surname . '</p>
					<input type="hidden" name="last_name" value="' . $surname . '">
					<br>
					<p class="d-inline font-weight-bold">Email:</p>
					<p class="d-inline">' . $email . '</p>
					<input type="hidden" name="email" value="' . $email . '">
					<br>
					<p class="d-inline font-weight-bold">Address:</p>
					<p class="d-inline">' . $addreess . '</p>
					<input type="hidden" name="address1" value="' . $addreess . '">
					<input type="hidden" name="address2" value="">
					<br>
					<p class="d-inline font-weight-bold">City:</p>
					<p class="d-inline">' . $city . '</p>
					<input type="hidden" name="city" value="' . $city . '">
					<br>
					<p class="d-inline font-weight-bold">Country:</p>
					<p class="d-inline">' . $country . '</p>
					<input type="hidden" name="country" value="GB">
					<br>
					<p class="d-inline font-weight-bold">Post Code:</p>
					<p class="d-inline">' . $postCode . '</p>
					<input type="hidden" name="zip" value="' . $postCode . '">
					<br>
					<br>
			</div>
		');

		echo('
			<div class="col-md-7 ml-3">
				<h3>Selected Products</h3>

				<div class="table-responsive-sm">
					<table class="table">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Product</th>
							<th scope="col">Amount</th>
							<th scope="col">Price per item</th>
						</tr>
					</thead>
					<tbody>
		');

		$c = count($checkoutItems['itemID']);

		for($i = 0; $i < $c; $i++){ 
			$n = $i + 1;

			echo('
				<tr>
					<th scope="row">' . $n . '</th>
					<td>' . $checkoutItems['itemName'][$i] . '</td>
					<td>' . $checkoutItems['itemQty'][$i] . '</td>
					<td>£' . $checkoutItems['itemPrice'][$i] . '</td>
					<input type="hidden" name="item_name_' . $n . '" value="' . $checkoutItems['itemName'][$i] . '">
					<input type="hidden" name="quantity_' . $n . '" value="' . $checkoutItems['itemQty'][$i] . '">
					<input type="hidden" name="amount_' . $n . '" value="' . $checkoutItems['itemPrice'][$i] . '">
					<input type="hidden" name="shipping_' . $n . '" value="0">
				</tr>
			');

			$totalPrice += ($checkoutItems['itemQty'][$i] * $checkoutItems['itemPrice'][$i]);
		}

		$_SESSION['order'] = json_encode($checkoutItems);

		echo('					
							<tr>
								<th scope="row" colspan="3" class="text-right">Shipping Costs:</th>
								<td>£0.00</td>
							</tr>

								<th scope="row" colspan="3" class="text-right">Total Price:</th>
								<td>£' . number_format($totalPrice, 2) . '</td>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="d-flex justify-content-center cart_buttons mb-5">
				<a href="shopping_cart.php" class="btn">Go Back</a>
				<input type="submit" class="btn" name="" value="Pay by Card" disabled>

				<input type="hidden" name="cmd" value="_cart">
				<input type="hidden" name="upload" value="1">
				<input type="hidden" name="business" value="sb-pj4pk1252949@business.example.com">
				<input type="hidden" name="return" value="http://michalpruszkowski.com/confirmation.php">
				<input type="hidden" name="address_override" value="0">
				<input type="hidden" name="currency_code" value="GBP">
				<input type="submit" class="btn" name="pay_now" value="Pay with PayPal">
			</div>
			</form>
		');
	}
?>