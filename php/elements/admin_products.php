<?php
	require_once "php/elements/tags_dropdown.php";

		function selected($selectValue){
			if($selectValue == 1){
				echo(' 
					<option value="1" selected>Yes</option>
					<option value="0">No</option>
				');
			} else {
				echo(' 
					<option value="1">Yes</option>
					<option value="0" selected>No</option>
				');
			}
		}

		$query_products = "SELECT * FROM products";
		$sql_products = mysqli_query($con, $query_products);

		$productID = array();
		$productName = array();
		$amount = array();
		$price = array();
		$discount = array();
		$description = array();
		$availability = array();
		$featured = array();
		$rating = array();

		while($rowProducts = mysqli_fetch_array($sql_products, MYSQLI_ASSOC)){
			array_push($productID, $rowProducts['productID']);
			array_push($productName, $rowProducts['product_name']);
			array_push($amount, $rowProducts['amount']);
			array_push($price, $rowProducts['price']);
			array_push($discount, $rowProducts['discount']*100);
			array_push($description, $rowProducts['description']);
			array_push($availability, $rowProducts['availability']);
			array_push($featured, $rowProducts['featured']);
			array_push($rating, $rowProducts['rating']);
		}
		
	echo('
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
					<th scope="col" style="width:2vw;">Product ID</th>
					<th scope="col" style="width:24vw;">Product Name</th>
					<th scope="col" style="width:4vw;">Stock Amount</th>
					<th scope="col" style="width:10vw;">Price (£)</th>
					<th scope="col" style="width:2vw;">Discount (%)</th>
					<th scope="col" style="width:24vw;">Product Description</th>
					<th scope="col" style="width:8vw;">Availability</th>
					<th scope="col" style="width:8vw;">Featured</th>
					<th scope="col" style="width:8vw;">Star Rating</th>
					<th scope="col" style="width:8vw;">Tags</th>
					<th scope="col"></th>
					</tr>
				</thead>
			<tbody>
	');

	for($i = 0; $i < count($productID); $i++){ 
		echo('
				<tr>
					<td>
						<h5>' . $productID[$i] . '</h5>
						
						<form class="validate" id="form_' . $productID[$i] . '" method="POST" action="php/admin/update_product.php"></form>
						<input type="hidden" name="product_id" class="form-control" value="' . $productID[$i] . '" form="form_' . $productID[$i] . '">
					</td>
					<td><input type="text" name="product_name" class="form-control" value="' . $productName[$i] . '" form="form_' . $productID[$i] . '" required></td>
					<td><input type="text" name="amount" class="form-control" value="' . $amount[$i] . '" pattern="^[0-9]*$" form="form_' . $productID[$i] . '" required></td>
					<td><input type="text" name="price" class="form-control" value="' . $price[$i] . '" pattern="(?=.*\d)+^[0-9.]*$" form="form_' . $productID[$i] . '" required></td>
					<td><input type="text" name="discount" class="form-control" value="' . $discount[$i] . '" pattern="^[0-9]*$" form="form_' . $productID[$i] . '" required></td>
					<td><textarea name="description" class="form-control" rows="4" form="form_' . $productID[$i] . '" required>' . $description[$i] . '</textarea></td>
					<td>
						<select name="availability" class="form-control" form="form_' . $productID[$i] . '" required>
			');

					selected($availability[$i]);

			echo('
						</select>
					</td>
					<td>
						<select name="featured" class="form-control" form="form_' . $productID[$i] . '" required>
			');

					selected($featured[$i]);

			echo('
						</select>
					</td>
					<td>
						<select name="rating" class="form-control" form="form_' . $productID[$i] . '" required>
			');
					for($r = 1; $r <= 5 ; $r++){ 
						echo('<option value="' . $r . '"');
							if($r == $rating[$i]){echo(' selected');}
						echo('>' . $r . '</option>');
					}
			echo('
						</select>
					</td>
					<td>
			');
			
				tagsDropdown_update($productID[$i], 'tags[]');

			echo('
					</td>
					<td><input type="submit" class="btn btn-lg" name="update_product" value="Save" form="form_' . $productID[$i] . '"></td>
				</tr>
		');
	}
		echo('
				</tbody>
			</table>
		</div>
	');
?>