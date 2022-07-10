<?php
	require_once 'session_start.php';
	require_once 'db_con.php';

	if(isset($_REQUEST["itemID"], $_REQUEST["itemQty"])){
		$qty = $_REQUEST['itemQty'];
		$itemID= $_REQUEST['itemID'];
		$totalPriceNew = 0;

		$cart = json_decode($_COOKIE["user_" . $userID . "_cart"], true);

		$query_productQty = "SELECT amount, product_name FROM products WHERE productID = '$itemID'";
		$sql_productQty = mysqli_query($con, $query_productQty);

		while($rowProductQty = mysqli_fetch_array($sql_productQty, MYSQLI_ASSOC)){
			$stock = $rowProductQty['amount'];
			$productName = $rowProductQty['product_name'];
		}

		if($qty > $stock){
			foreach($cart as &$item){
				if($item["productID"] === $itemID){
					$qty = $item["qty"];
				}
				
				$totalPriceNew += $item["qty"] * $item["price"];
			}

			echo('
				<script>
					$(document).ready(function(){
						alert("Selected amount of ' . $productName . ' exceeds available amount of this product. Stock available: ' . $stock . '.");
						$(".input-group").find("input[value=' . $itemID . ']").nextAll("input[name=\'checkoutItems[itemQty][]\']").val(' . $qty . ');
					});
				</script>'
			);

			echo('£' . number_format($totalPriceNew, 2));

		} else {
			foreach($cart as &$item){
				if($item["productID"] === $itemID){
					$item["qty"] = $qty;
				}

				$totalPriceNew += $item["qty"] * $item["price"];
			}

			require 'cookie_set_cart.php';

			echo('£' . number_format($totalPriceNew, 2));
		}
	}
?>
