<?php
	if(isset($_GET['error'])){
		$valMsg = $_GET['error'];
		
		echo('
			<div class="alert alert-danger" role="alert">
				'. $valMsg .'
			</div>
		');
	} 

	if(isset($_GET['success'])){
		$valMsg = $_GET['success'];
		
		echo('
			<div class="alert alert-success" role="alert">
				'. $valMsg .'
			</div>
		');
	} 
?>