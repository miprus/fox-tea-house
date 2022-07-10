<?php
	if(isset($_COOKIE["user_" . $userID . "_cart"])){ 
		$cart = json_decode($_COOKIE["user_" . $userID . "_cart"], true);
		$totalPrice = 0;

		foreach($cart as &$item){
			$totalPrice += $item["qty"] * $item["price"];
		}

		echo('
			<div class="d-flex justify-content-center cart_buttons">
				<a href="store.php" class="btn">Return to Shopping</a>
			</div>

			<div class="table-responsive-sm">
				<table class="table">
					<thead>
						<tr>
						<th scope="col">Product Name</th>
						<th scope="col">Order Amount</th>
						<th scope="col">Price</th>
						</tr>
					</thead>

					<tbody>
		');

		foreach($cart as $cartItem){
			echo('
				<tr>
					<th scope="row">' . $cartItem["productName"] . '</th>
					<td>
						<div class="input-group input-group-sm">
							<div class="input-group-prepend">
								<a href="php/config/remove_from_cart.php?productID=' . $cartItem["productID"] . '" class="btn"><i class="fas fa-trash pt-2"></i></a>
							</div>

							<div class="input-group-prepend">
								<button class="btn sub_btn" type="button"><i class="fas fa-minus"></i></button>
							</div>

								<input type="hidden" name="checkoutItems[itemID][]" value="' .  $cartItem["productID"] . '" form="cart_form">
								<input type="hidden" name="checkoutItems[itemName][]" value="' .  $cartItem["productName"] . '" form="cart_form">
								<input type="hidden" name="checkoutItems[itemPrice][]" value="' .  $cartItem["price"] . '" form="cart_form">
								<input type="number" class="form-control" name="checkoutItems[itemQty][]" value="' .  $cartItem["qty"] . '" placeholder="qty" form="cart_form">

							<div class="input-group-append">
								<button class="btn add_btn" type="button"><i class="fas fa-plus"></i></button>
							</div>
						</div>

					</td>
					<td>£' .  $cartItem["price"] . '</td>
				</tr>
			');
		}

		echo('
					<tr>
						<th scope="row" colspan="2" class="text-right">Total Price:</th>
						<td><span id="total_price">£' . number_format($totalPrice, 2) . '<span></td>
					</tr>
				</tbody>
			</table>
		</div>
	');

	require_once 'php/elements/get_address_form.php';
	
	} else {
		echo('
			<h4>Your shopping cart is empty</h4>

			<a href="store.php" class="btn mt-5">Shop Now</a>
		');
	}
?>