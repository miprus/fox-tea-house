<?php
	function imgQuery($con, $id){
		$query_images = "SELECT * FROM images WHERE productID = '$id'";
		global $sql_images;
		$sql_images = mysqli_query($con, $query_images);
	}

    $query_product = "SELECT product_name, productID FROM products";
	$sql_product  = mysqli_query($con, $query_product);

	while($rowProducts = mysqli_fetch_array($sql_product, MYSQLI_ASSOC)){
		$productID = $rowProducts['productID'];
		
		echo('
			<h3 class="mt-5">Product Name: ' . $rowProducts['product_name'] . '</h3>
				<div class="d-flex flex-wrap justify-content-start">
		');

		imgQuery($con, $productID);

		if(mysqli_num_rows($sql_images) >= 1){
			while($rowImages = mysqli_fetch_array($sql_images, MYSQLI_ASSOC)){
				echo('
					<div class="img_tile">
						<form method="POST" action="php/admin/delete_img.php">
							<img src="' . $rowImages['img'] . '" alt="' . $rowImages['img'] . '">
							<input type="hidden" name="img_id" value="' . $rowImages['imgID']  . '">
							<input type="submit" class="btn btn-lg" name="delete_img" value="Delete">
						</form>
					</div>
				');
			}

		} else {
			echo('<h4 class="error-message">No images for this product in databse yet!</h4>');
		}
		
		echo('
				<form runat="server" class="img_upload d-flex align-items-end validate" method="POST" action="php/admin/new_img.php" enctype="multipart/form-data">
					<input type="file" class="upload_input" name="new_img">
					<input type="hidden" name="product_id" value="' . $productID  . '">
					<img src="#" alt="" class="img_preview mr-5 mt-2">
						
					<input type="submit" class="btn btn-lg" name="upload_img" value="Upload">
				</form>
			</div>
			<hr>
		');
    }
?>