<?php
	$query_orders = "SELECT o.*, p.* FROM orders o, products p WHERE o.productID = p.productID AND o.userID = '$userID'";
	$sql_orders = mysqli_query($con, $query_orders);

    if(mysqli_num_rows($sql_orders) > 0){
		$orderID = array();
		$productName = array();
		$orderAmount = array();
		$orderPrice = array();
		$orderDate = array();

		while($rowOrders = mysqli_fetch_array($sql_orders, MYSQLI_ASSOC)){
			array_push($orderID, $rowOrders['orderID']);
			array_push($productName, $rowOrders['product_name']);
			array_push($orderAmount, $rowOrders['order_amount']);
			array_push($orderPrice, $rowOrders['order_price']);
			array_push($orderDate, $rowOrders['order_date']);
		}

		echo('
			<table class="table">
				<thead>
					<tr>
						<th scope="col" id="order_id">ID</th>
						<th scope="col" id="order_product_name">Product Name</th>
						<th scope="col" id="order_amount">Total Amount</th>
						<th scope="col" id="order_price">Price</th>
						<th scope="col" id="order_date">Date</th>
					</tr>
				</thead>

				<tbody>
		');

		for($i = 0; $i < count($orderID); $i++){ 
			echo('
				<tr>
					<th scope="row" headers="order_id" id="order_id_' . $orderID[$i] . '">' . $orderID[$i] . '</th>
					<td headers="order_product_name" id="order_product_name_' . $orderID[$i] . '">' . $productName[$i] . '</td>
					<td headers="order_amount" id="order_amount_' . $orderID[$i] . '">' . $orderAmount[$i] . '</td>
					<td headers="order_price" id="order_price_' . $orderID[$i] . '">£' . $orderPrice[$i] . '</td>
					<td headers="order_date" id="order_date_' . $orderID[$i] . '">' . $orderDate[$i] . '</td>
				</tr>
			');
		}

	echo('
			</tbody>
		</table>
	');

	} else {
		echo('<h4 class="error-message">No data to display</h4>');
	}
?>