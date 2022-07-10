<?php
if(empty($_SESSION['cookie_notify'])){
	if(isset($_POST['notify_btn'])){
		$_SESSION['cookie_notify'] = true;
	}

	if(empty($_SESSION['cookie_notify'])){
		echo('
			<aside class="notify_box wow fadeIn">
				<form method="POST" action="index.php">
					<p>Your privacy is very important to us. That\'s why we are using cookies to improve our website\'s usability and protect your data. For additional information continue reading here:<a href="copyright_notice.php"><i class="fas fa-external-link-alt pl-2"></i> Copyrigth Notice</a></p>
					<button type="submit" class="btn btn-sm" name="notify_btn">Got It!</button>
				</form>
			</aside>
		');
	}
}
?>