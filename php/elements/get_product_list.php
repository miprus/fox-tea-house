<?php
	$offset = ($page - 1) * 9;

	if(isset($_GET['category'])){
		$category = $_GET['category'];

		switch($category){
			case 'tea':
				$query_productList = "SELECT p.* FROM products p, tag_map tm, tags t WHERE tm.tagID = t.tagID
				AND p.productID = tm.productID
				AND (t.tag_name IN ('tea', 'leaf', 'leaves', 'loose'))
				AND p.availability = 1
				AND p.amount > 0
				GROUP BY p.productID
				ORDER BY p.product_name 
				LIMIT $offset, 9";
				break;

			case 'teaware':
				$query_productList = "SELECT p.* FROM products p, tag_map tm, tags t WHERE tm.tagID = t.tagID
				AND p.productID = tm.productID
				AND (t.tag_name IN ('teaware', 'teapot', 'cup', 'ceramic', 'porcelain'))
				AND p.availability = 1
				AND p.amount > 0
				GROUP BY p.productID
				ORDER BY p.product_name
				LIMIT $offset, 9";
				break;
				
			default:
				$query_productList = "SELECT * FROM products WHERE availability = 1 GROUP BY productID LIMIT $offset, 9";
				break;
		}

	} else {
		$query_productList = "SELECT * FROM products WHERE availability = 1 GROUP BY productID LIMIT $offset, 9";
	}

	$sql_productList = mysqli_query($con, $query_productList);
	if(mysqli_num_rows($sql_productList) == 0){
		echo('<h4 class="error-message">No available products in this category...</h4>');
	}

	while($row_productList = mysqli_fetch_array($sql_productList, MYSQLI_ASSOC)){
		$pruductName = $row_productList['product_name'];
		$price = $row_productList['price'];
		$discount = $row_productList['discount'];
		$rating = $row_productList['rating'];
		$productID = $row_productList['productID'];

		//get product's image
		$query_productImg ="SELECT img FROM images WHERE productID = '$productID' GROUP BY imgID LIMIT 1";
		$sql_productImg = mysqli_query($con, $query_productImg);
		$row_productImg = mysqli_fetch_array($sql_productImg, MYSQLI_NUM);

		$imgSRC = $row_productImg[0];

		//prepare modules to echo them
		//calculate price with discount
		if($discount > 0){
			$price = (1 - $discount) * $price;
			$price = number_format($price, 2, '.', '');

			$priceHeading ='<h5>Price: <s class="error-message">£' . $row_productList['price'] . '</s>/<em class="text-success">£' . $price . '</em></h5>';

		} else {
			$priceHeading = '<h5>Price: £' . $price . '</h5>';
		}

		//Stars icons
		$starsIcons ='';
		for($i=0; $i < $rating; $i++){ 
			$starsIcons .= '<i class="fas fa-star filled"></i>';
		}
		
		for($i=0; $i < (5 - $rating); $i++){ 
			$starsIcons .= '<i class="fas fa-star"></i>';
		}

		echo('
			<div class="col">
				<div class="card store_product">
					<img src="' . $imgSRC . '" class="card-img-top" alt="' . $imgSRC . '">

					<div class="card-body">
						<h5 class="card-title">' . $pruductName . '</h5>
						<div class="card-text">'
							. $priceHeading .'
							Quality: ' . $starsIcons .'
						</div>
						
					<br>
					<a href="product_info.php?id=' . $productID . '" class="btn">Show More</a>
					</div>
				</div>
			</div>
		');
	}
?>