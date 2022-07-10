<?php
if(isset($_GET['id'])){
    $productID = $_GET['id'];
	
	//get product's details
    $query_product = "SELECT * FROM products WHERE productID = '$productID'";
	$sql_product = mysqli_query($con, $query_product);
	
		while($rowProduct = mysqli_fetch_array($sql_product, MYSQLI_ASSOC)){
			$productName = $rowProduct['product_name'];
			$amount = $rowProduct['amount'];
			$price = $rowProduct['price'];
			$description = $rowProduct['description'];
			$rating = $rowProduct['rating'];
			$discount = $rowProduct['discount'];
			$availability = $rowProduct['availability'];
		}

    if($discount > 0){
		$price = (1 - $discount) * $price;
		$price = number_format($price, 2, '.', '');
    }

    if($availability == 0 || $amount == 0){
		$availabilityMsg = '<span class="text-dnager">Out of Stock</span>';
		$btn_state = ' disabled';

    } else {
		$availabilityMsg = '<span class="text-success">In Stock</span>';
		$btn_state = '';
	}
	
///////////////////////////////////Page Content Display//////////////////////////////////////////
	echo('
		<section class="row justify-content-center no-gutters my-5">
			<section class="col-md-6 mx-5">
	');

	//get product's images
	$query_img = "SELECT img FROM images WHERE productID = '$productID'";
	$sql_img = mysqli_query($con, $query_img);

	$c = 1;

	while($rowImg = mysqli_fetch_array($sql_img, MYSQLI_ASSOC)){
		if($c == 1){
			echo('
				<div class="product_img">
					<img src="' . $rowImg['img'] . '" id="expandedImg" class="img-fluid" alt="' . $rowImg['img'] . '">
				</div>

				<div class="d-flex flex-wrap justify-content-start">
			');
		
			$c++;
		}

		echo('
			<div class="nav_img">
				<img src="' . $rowImg['img'] . '" alt="' . $rowImg['img'] . '" onclick="showImage(this);">
			</div>
		');
    }

	echo('
		</div>

		<article class="product_description">
			<h2>' . $productName . '</h2>
			<hr>
			<p>' . $description . '</p>
			
			<a href="store.php?page=1&heading=store" class="btn mt-5">Return to Shopping</a>
			<hr>
		</article>
	</section>

	<section class="col-md-3 mx-5">
		<aside class="rating_aside mx-auto">
			<h3 class="mb-3">Product Review</h3>
	');

	for($i=0; $i < $rating; $i++){ 
		echo('
			<i class="fas fa-star filled"></i>
		');
	}
	
	for($i=0; $i < (5 - $rating); $i++){ 
		echo('
			<i class="fas fa-star"></i>
		');
	}

	echo('
		</aside>

		<section class="product_details">
			<h3>' . $productName . '</h3>
			<br>
	');

		if($discount > 0){
				echo('<h3>
						Price: 
						<s class="error-message">£' . number_format(($price / (1 - $discount)), 2, '.', '') . '</s>
						/
						<em class="text-success">£' . $price . '</em>
					</h3>');
			} else {
				echo('<h3>Price: £' . $price . '</h3>');
			}

	echo('
			<h3>' . $availabilityMsg . '</h3>

			<form class="form-inline mt-5" method="POST" action="php/config/add_to_cart.php">
				<input type="text" class="form-control mr-3 mt-2" name="qty" pattern="^[0-9]*$" title="Please enter a number!" placeholder="Quantity">
				<input type="hidden" name="productID" value="' . $productID . '">
				<input type="hidden" name="price" value="' . $price . '">
				<input type="hidden" name="productName" value="' . $productName . '">
				<input type="submit" name="add_to_cart" class="btn mt-2" value="Add to Cart"' . $btn_state . '>
			</form>

			<a href="policy.php">Return Policy</a>
		</section>

		<div class="d-flex justify-content-center">
			<a href="store.php?page=1&heading=store" class="btn">Return to Shopping</a>
		</div>
	</section>
	</section>

	<hr class="line_orange">

	<section class="recomended_products d-flex justify-content-center flex-column">
	<h2>You may also like:</h2>

		<section class="products_group mx-auto">
	');

	$product_display = 'product_info';
	require_once 'php/elements/get_featured_product.php';

	echo('
		</section>
	</section>
	');
} 
?>