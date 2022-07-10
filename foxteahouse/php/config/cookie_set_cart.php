<?php
	$cookieName = "user_" . $userID . "_cart";
	$cookieCart = json_encode($cart);
	$cookieTime = time() + 86400;
	setcookie($cookieName, $cookieCart, $cookieTime, "/");
?>