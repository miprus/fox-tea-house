<?php 
	session_start();
	unset($_SESSION['username']);
	unset($_SESSION['userID']);
    unset($_SESSION['member']);

	session_destroy();

	$cookieName = "user_" . $_SESSION['userID'] . "_tags";
	$tags = '';
	$cookieTime = 1;
	setcookie($cookieName, $tags, $cookieTime, "/");

	$cookieName = "user_" . $_SESSION['userID'] . "_cart";
	$cart = '';
	$cookieTime = 1;
	setcookie($cookieName, $cart, $cookieTime, "/");

    header("Location: ../../index.php");
    exit;
?>