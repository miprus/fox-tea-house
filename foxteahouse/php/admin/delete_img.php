<?php
	require_once '../config/session_start.php';
	require_once '../config/db_con.php';

	if(isset($_POST['delete_img']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
		$imgID = $_POST['img_id'];

		$query_imgPath = "SELECT img FROM images WHERE imgID = '$imgID'";
		$sql_imgPath  = mysqli_query($con, $query_imgPath);

		while($rowImg = mysqli_fetch_array($sql_imgPath, MYSQLI_ASSOC)){
			$img = $rowImg['img'];
			$imgName = basename($rowImg['img']);
		}

		$query_deleteImg = "DELETE FROM images WHERE imgID = '$imgID'";

		if(mysqli_query($con, $query_deleteImg) && unlink('../../' . $img)){
			$valMsg = 'Image - "' . $imgName . '" have been deleted from database';
			header('Location:../../admin_panel.php?success=' . $valMsg . '#Images');
			exit;

		} else {
			$valMsg = 'Something went wrong... failed to deleted image - "' . $imgName . '" from database...';
			header('Location:../../admin_panel.php?error=' . $valMsg . '#Images');
			exit;
		}
	} else {
		$valMsg = 'Something went wrong...';
		header('Location:../../admin_panel.php?error=' . $valMsg . '#Images');
		exit;
	}
?>