<?php
	$query_history = "SELECT * FROM orders WHERE userID = '$userID'";
	$sql_history = mysqli_query($con, $query_history);

	if((mysqli_num_rows($sql_history) >= 1)){
		$query_tags = "SELECT DISTINCT t.tag_name FROM products p, tag_map tm, tags t, orders o WHERE tm.tagID = t.tagID AND p.productID = tm.productID AND p.productID = o.productID AND o.userID = '$userID'";

	} else {
		$query_tags = "SELECT DISTINCT t.tag_name FROM products p, tag_map tm, tags t WHERE tm.tagID = t.tagID AND p.productID = tm.productID AND p.featured = 1";
	}

	$sql_tags = mysqli_query($con, $query_tags);

		while($rowTags = mysqli_fetch_array($sql_tags, MYSQLI_ASSOC)) {
			$tags_list[] = $rowTags['tag_name'];
		}

	$cookieName = "user_" . $userID . "_tags";
	$cookieTags = json_encode($tags_list);
	$cookieTime = time() + 86400;
	setcookie($cookieName, $cookieTags, $cookieTime, "/");
?>