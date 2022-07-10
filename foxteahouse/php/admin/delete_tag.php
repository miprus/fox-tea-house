<?php
	require_once '../config/session_start.php';
	require_once '../config/db_con.php';

	if(isset($_POST['delete_tag']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
		$tagID = $_POST['tag_id'];

		$query_tagName = "SELECT tag_name FROM tags WHERE tagID = '$tagID'";
		$sql_tagName = mysqli_query($con, $query_tagName);

		while($rowTag = mysqli_fetch_array($sql_tagName, MYSQLI_ASSOC)){
			$tagName = $rowTag['tag_name'];
		}

		$query_deleteTag = "DELETE FROM tags WHERE tagID = '$tagID'";
		$query_deleteTag_map = "DELETE FROM tag_map WHERE tagID = '$tagID'";
		
		
		if(mysqli_query($con, $query_deleteTag) && mysqli_query($con, $query_deleteTag_map)){
			$valMsg = 'Tag - "' . $tagName . '" have been deleted from database';
			header('Location:../../admin_panel.php?success=' . $valMsg . '#Tags');
			exit;

		} else {
			$valMsg = 'Something went wrong... failed to deleted tag - "' . $tagName . '" from database...';
			header('Location:../../admin_panel.php?error=' . $valMsg . '#Tags');
			exit;
		}
	} else {
		$valMsg = 'Something went wrong...';
		header('Location:../../admin_panel.php?error=' . $valMsg . '#Tags');
		exit;
	}
?>