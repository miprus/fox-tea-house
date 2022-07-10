<?php
	require_once '../config/db_con.php';

	if(empty($_FILES['new_img']['name']) == false){  
		$productID = $_POST['product_id'];                                                                                       
		$target_dir = "../../img/";
		$target_name = basename($_FILES["new_img"]["name"]);
		$target_name  = preg_replace('/\s+/', '_', $target_name);
		$target_file = $target_dir . 	$target_name;
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		$queryPath = 'img/' . 	$target_name;

		//check if image file is a actual image or fake image
		if(getimagesize($_FILES["new_img"]["tmp_name"]) == false){
			$valMsg = 'Selected file is not an image';
			header('Location:../../admin_panel.php?error=' . $valMsg . '#Images');
			exit;
		}

		//check if file already exists
		if(file_exists($target_file)){
			$valMsg = 'Selected image already exists';
			header('Location:../../admin_panel.php?error=' . $valMsg . '#Images');
			exit;
		}

		//check the file size
		if($_FILES["new_img"]["size"] > 2000000){
			$valMsg = 'Selected image is too large. Allowed max file size is 2MB.';
			header('Location:../../admin_panel.php?error=' . $valMsg . '#Images');
			exit;
		}

		//allow only certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "tiff" && $imageFileType != "svg"){
			$valMsg = 'Selected image must be either: JPG, JPEG, PNG, GIF, TIFF or SVG only!';
			header('Location:../../admin_panel.php?error=' . $valMsg . '#Images');
			exit;
		}

		if(move_uploaded_file($_FILES["new_img"]["tmp_name"], $target_file)){
			$query_newImg = "INSERT INTO images (productID, img) VALUES ('$productID', '$queryPath')";
			mysqli_query($con, $query_newImg);

			$valMsg = 'The image - ' . 	$queryPath . ' has been uploaded';
			header('Location:../../admin_panel.php?success=' . $valMsg . '#Images');
			exit;

		} else {
			$valMsg = 'Something went wrong... failed to upload image - ' . basename( $_FILES["new_img"]["name"]);
			header('Location:../../admin_panel.php?error=' . $valMsg . '#Images');
			exit;
		}

	} else {
		$valMsg = 'Something went wrong...';
		header('Location:../../admin_panel.php?error=' . $valMsg . '#Images');
		exit;
	}
?>