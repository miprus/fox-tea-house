<?php
	require_once 'php/config/session_start.php';
	require_once 'php/config/db_con.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Michal Pruszkowski">
    <meta name="description" content="FoxTeaHouse - confirmation page. Simple message notifying order status.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta name="robots" content="noindex, nofollow">
    <title>Fox Tea House - Order Confirmation</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Lato|Merienda&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="library/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="library/owlcarousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<main class="container-fluid">
	<?php
		require_once 'php/nav/top_section.php';

	if(isset($_GET['st']) && $_GET['st'] == 'Completed'){
		echo('
			<article class="text-center" style="padding: 6% 12% 12% 12%;">
				<h1>Thank You!</h1>
				<h2>Your order is complete. We will start preparing your items for delivery shortly.<h2>
				<div class="d-flex justify-content-center my-5">
					<img src="img/logo/fth_logo.svg" class="logo_small">
				</div>
				<div class="d-flex justify-content-center my-5">
					<a href="index.php" class="btn">Return to Home</a>
				</div>
			</article>
		');

		if($userID != 'guest'){
			$orderItems = json_decode($_SESSION['order'], true);
			$orderDate = date('Y-m-d');

			$c = count($orderItems['itemID']);

			for($i = 0; $i < $c; $i++){ 
				$orderProductID = $orderItems['itemID'][$i];
				$orderAmount = $orderItems['itemQty'][$i];
				$orderPrice = $orderItems['itemPrice'][$i] * $orderAmount;

				$newOrder_query = "INSERT INTO orders (userID, productID, order_amount, order_price, order_date) VALUES ('$userID', '$orderProductID', '$orderAmount', '$orderPrice', '$orderDate')";
				mysqli_query($con, $newOrder_query);

				$stockUpdate_query = "UPDATE products SET amount = amount - '$orderAmount' WHERE productID = '$orderProductID'";
				mysqli_query($con, $stockUpdate_query);
			}

		}elseif($userID == 'guest'){
			$orderItems = json_decode($_SESSION['order'], true);
			$orderDate = date('Y-m-d');

			$c = count($orderItems['itemID']);

			for($i = 0; $i < $c; $i++){ 
				$orderProductID = $orderItems['itemID'][$i];
				$orderAmount = $orderItems['itemQty'][$i];
				$orderPrice = $orderItems['itemPrice'][$i] * $orderAmount;

				$newOrder_query = "INSERT INTO orders (userID, productID, order_amount, order_price, order_date) VALUES ('0', '$orderProductID', '$orderAmount', '$orderPrice', '$orderDate')";
				mysqli_query($con, $newOrder_query);

				$stockUpdate_query = "UPDATE products SET amount = amount - '$orderAmount' WHERE productID = '$orderProductID'";
				mysqli_query($con, $stockUpdate_query);
			}
		}

		$cookieName = "user_" . $userID . "_cart";
		$cart = '';
		$cookieTime = time() - 1;
		setcookie($cookieName, $cart, $cookieTime, "/");
	}
    	require_once 'php/elements/footer.php';
    ?>
</main>
    <!--Bootstrap libraries-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!--other js libraries-->
    <script src="https://kit.fontawesome.com/c40e1a0997.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/popper.js@1"></script>
    <script src="https://unpkg.com/tippy.js@5"></script>
	<script src="library/owlcarousel/owl.carousel.min.js"></script>
	<!--custom scripts-->
	<script src="js/master_nav.js"></script>
	<script src="js/form_validation.js"></script>
</body>
</html>