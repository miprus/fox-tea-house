<?php
	date_default_timezone_set('UTC');
	
	session_start();

	if(isset($_SESSION['username'], $_SESSION['userID'], $_SESSION['member'])){
		$member_type = $_SESSION['member'];
		$userID = $_SESSION['userID'];

	} else {
		$member_type = 'guest';
		$userID = 'guest';
	}
?>