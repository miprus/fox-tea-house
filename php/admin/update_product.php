<?php
	require_once '../config/session_start.php';
	require_once '../config/db_con.php';

	if(isset($_POST['update_product']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
		$productID = $_POST['product_id'];
		$productName = $_POST['product_name'];
		$amount = $_POST['amount'];
		$price = $_POST['price'];
		$discount = $_POST['discount'] / 100;
		$description = $_POST['description'];
		$description = mysqli_real_escape_string($con, $description);
		$availability = $_POST['availability'];
		$featured = $_POST['featured'];
		$rating = $_POST['rating'];
		$tags = $_POST['tags'];

		$query_updateProduct = "UPDATE products SET product_name = '$productName', amount = '$amount', price = '$price', description = '$description', rating = '$rating', discount = '$discount', featured = '$featured', availability = '$availability' WHERE productID = '$productID'";

		$query_deleteTagMap = "DELETE FROM tag_map WHERE productID = '$productID'";
		mysqli_query($con, $query_deleteTagMap);

		foreach($tags as $value){
			$query_updateTagMap = "INSERT INTO tag_map (productID, tagID) VALUES ('$productID', '$value')";
			mysqli_query($con, $query_updateTagMap);
		}

		unset($value);


		if(mysqli_query($con, $query_updateProduct)){
			$valMsg = 'Product\'s details have been updated';
			header('Location:../../admin_panel.php?success=' . $valMsg . '#Products');
			exit;

		} else {
			$valMsg = 'Something went wrong... failed to update droduct\'s details...';
			header('Location:../../admin_panel.php?error=' . $valMsg . '#Products');
			exit;
		}
	} else {
		$valMsg = 'Something went wrong...';
		header('Location:../../admin_panel.php?error=' . $valMsg . '#Products');
		exit;
	}
?>