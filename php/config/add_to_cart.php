<?php
	require_once 'session_start.php';
	require_once 'db_con.php';

	function checkStock($qtyCheck, $stockCheck, $productID){
		if($qtyCheck > $stockCheck){
			$valMsg = 'Selected amount exceeded available product\'s amount. Stock available: ' . $stockCheck . '.';
			header('Location:../../product_info.php?id=' . $productID . '&error=' . $valMsg);
			exit;
		}
	}

	if(isset($_POST['add_to_cart']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
		$productID = $_POST['productID'];
		$qty = $_POST['qty'];
		$price = $_POST['price'];
		$productName = $_POST['productName'];

		$query_productQty = "SELECT amount FROM products WHERE productID = '$productID'";
		$sql_productQty = mysqli_query($con, $query_productQty);
	
		$rowProductQty = mysqli_fetch_array($sql_productQty, MYSQLI_NUM);
		$stock = $rowProductQty[0];
		
		
		if(empty($_POST['qty']) == true){
			$valMsg = 'Please enter quantity which you want to buy';
			header('Location:../../product_info.php?id=' . $productID . '&error=' . $valMsg);
			exit;

		} elseif(isset($_COOKIE["user_" . $userID . "_cart"])){
			$cartJSON = $_COOKIE["user_" . $userID . "_cart"];
			$cart = json_decode($_COOKIE["user_" . $userID . "_cart"], true);

			//check if item is already in shopping cart
			if(strpos($cartJSON, $productName) === false){
				$cart[] = array(
					"productID" => $productID,
					"qty" => $qty,
					"price" => $price,
					"productName" => $productName
				);

			} else {
				foreach($cart as &$item){
					if($item["productName"] === $productName){
						$item["qty"] += $qty;
						$newQty = $item["qty"];

						break;
					}
				}
			}
			//check against available stock
			checkStock($newQty, $stock, $productID);

			require 'cookie_set_cart.php';

			header('Location:../../shopping_cart.php');
			exit;

		} else {
			//check against available stock
			checkStock($qty, $stock, $productID);

			//create new cart by adding selected item
			$cart = array();
			$cart[] = array(
				"productID" => $productID,
				"qty" => $qty,
				"price" => $price,
				"productName" => $productName
			);

			require 'cookie_set_cart.php';

			header('Location:../../shopping_cart.php');
			exit;			
		}
	}

?>