<?php
	require_once '../config/session_start.php';
	require_once '../config/db_con.php';

	if(isset($_POST['add_tag']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
		$tagName = $_POST['new_tag'];
		
		$query_tagCheck = "SELECT * FROM tags WHERE tag_name = '$tagName'";
		$sql_tagCheck = mysqli_query($con, $query_tagCheck);

        if(mysqli_num_rows($sql_tagCheck) > 0){
			$valMsg = 'Tag name already exists';
			header('Location:../../admin_panel.php?error=' . $valMsg . '#Tags');
			exit;

		} else {
			$query_addTag = "INSERT INTO tags (tag_name) VALUES ('$tagName')";

			if(mysqli_query($con, $query_addTag)){
				$valMsg = 'New tag name has been added to database';
				header('Location:../../admin_panel.php?success=' . $valMsg . '#Tags');
				exit;
	
			} else {
				$valMsg = 'Something went wrong... failed to add new tag name to database...';
				header('Location:../../admin_panel.php?error=' . $valMsg . '#Tags');
				exit;
			}
		}

	} else {
		$valMsg = 'Something went wrong...';
		header('Location:../../admin_panel.php?error=' . $valMsg . '#Tags');
		exit;
	}
?>