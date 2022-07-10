<?php
	if($product_display == 'product_info'){
		if($member_type != 'guest'){
			$tags = json_decode($_COOKIE["user_" . $userID . "_tags"], true);
			$c = count($tags);
			$i = 1;
			$tags_list = '';

			foreach($tags as $value){
				if($i < $c){
					$tags_list .= "'" . $value . "', ";
				} else {
					$tags_list .= "'" . $value . "'";
				}
				$i++;
			}

			//get similar products 
			$query_featured = "SELECT p.* FROM products p, tag_map tm, tags t WHERE tm.tagID = t.tagID
			AND (t.tag_name IN (" . $tags_list . "))
			AND p.productID = tm.productID
			GROUP BY p.productID LIMIT 3";

		} else {
			$query_featured = "SELECT * FROM products WHERE featured = 1 LIMIT 3";
		}

	} elseif($product_display == 'home_page'){
		$query_featured = "SELECT * FROM products WHERE featured = 1";
	}

	$sql_featured = mysqli_query($con, $query_featured);

	//display similar products in form of cards
	while($rowFeatured = mysqli_fetch_array($sql_featured, MYSQLI_ASSOC)){
		$f_productID = $rowFeatured['productID'];
		$f_pruductName = $rowFeatured['product_name'];
		$f_price = $rowFeatured['price'];
		$f_discount = $rowFeatured['discount'];
		$f_rating = $rowFeatured['rating'];

		//get product's image
		$query_featuredImg = "SELECT img FROM images WHERE productID = '$f_productID' LIMIT 1";
		$sql_featuredImg = mysqli_query($con, $query_featuredImg);
		$row_featuredImg = mysqli_fetch_array($sql_featuredImg, MYSQLI_NUM);

		$imgSRC = $row_featuredImg[0];

		//prepare modules to echo them
		//calculate price with discount
		if($f_discount > 0){
			$f_price = (1 - $f_discount) * $f_price;
			$f_price = number_format($f_price, 2, '.', '');

			$priceHeading ='<h5>Price: <s class="error-message">£' . $rowFeatured['price'] . '</s>/<em class="text-success">£' . $f_price . '</em></h5>';

		} else {
			$priceHeading = '<h5>Price: £' . $f_price . '</h5>';
		}

		//Stars icons
		$starsIcons ='';
		for($i=0; $i < $f_rating; $i++){ 
			$starsIcons .= '<i class="fas fa-star filled"></i>';
		}
		
		for($i=0; $i < (5 - $f_rating); $i++){ 
			$starsIcons .= '<i class="fas fa-star"></i>';
		}

		echo('
			<div class="card featured_product">
				<img src="' . $imgSRC . '" class="card-img-top" alt="' . $imgSRC . '">

				<div class="card-body">
					<h5 class="card-title">' . $f_pruductName . '</h5>
					<div class="card-text">'
						. $priceHeading .'
						Quality: ' . $starsIcons .'
					</div>
					
					<a href="product_info.php?id=' . $f_productID . '" class="btn">Show More</a>
				</div>
			</div>
			');
	}
?>