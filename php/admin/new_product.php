<?php
	require_once '../config/session_start.php';
	require_once '../config/db_con.php';

	if(isset($_POST['add_product']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
		$newProductName = $_POST['new_product_name'];
		$newAmount = $_POST['new_amount'];
		$newPrice = $_POST['new_price'];
		$newDiscount = $_POST['new_discount'] / 100;
		$newDescription = $_POST['new_description'];
		$newDescription = mysqli_real_escape_string($con, $newDescription);
		$newAvailability = $_POST['new_availability'];
		$newFeatured = $_POST['new_featured'];
		$newRating = $_POST['new_rating'];
		$newTags = $_POST['new_tags'];

		$query_addProduct = "INSERT INTO products (product_name, amount, price, description, rating, discount, featured, availability) VALUES ('$newProductName', '$newAmount', '$newPrice', '$newDescription', '$newRating', '$newDiscount', '$newFeatured', '$newAvailability')";

		if(mysqli_query($con, $query_addProduct)){
			$query_productID = "SELECT productID FROM products ORDER BY productID DESC LIMIT 1;";
			$productID = mysqli_fetch_array(mysqli_query($con, $query_productID), MYSQLI_ASSOC);

			$productID = $productID['productID'];
			
			foreach($newTags as $value){
				$query_updateTagMap = "INSERT INTO tag_map (productID, tagID) VALUES ('$productID', '$value')";
				mysqli_query($con, $query_updateTagMap);
			}

			unset($value);

			$valMsg = 'New product have been added to database';
			header('Location:../../admin_panel.php?success=' . $valMsg . '#Add_New_Product');
			exit;

		} else {
			$valMsg = 'Something went wrong... failed to add new product to database...';
			header('Location:../../admin_panel.php#Add_New_Product?error=' . $valMsg . '#Add_New_Product');
			exit;
		}
		
	} else {
		$valMsg = 'Something went wrong...';
		header('Location:../../admin_panel.php#Add_New_Product?error=' . $valMsg . '#Add_New_Product');
		exit;
	}
?>