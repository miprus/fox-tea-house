<?php
	require_once 'session_start.php';

	$productID = $_GET['productID'];
	$cart = json_decode($_COOKIE["user_" . $userID . "_cart"], true);

	foreach($cart as $key => $item){
		if($item["productID"] == $productID){
			unset($cart[$key]);

			break;
		}
	}

	if(count($cart) == 0){
		$cookieName = "user_" . $userID . "_cart";
		$cart = '';
		$cookieTime = 1;
		setcookie($cookieName, $cart, $cookieTime, "/");
		
	} else {
		require 'cookie_set_cart.php';
	}

	header('Location:../../shopping_cart.php');
	exit;	
?>