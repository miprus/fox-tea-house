<?php
	if(isset($_GET['page'])){
		$page = $_GET['page'];
	} else {
		$page = 1;
	}

	if(isset($_GET['heading'])){
		$heading = $_GET['heading'];
	}

	if(isset($_GET['category'])){
		$category = $_GET['category'];

		switch ($category){
			case 'tea':
				$query_maxPage = "SELECT COUNT(DISTINCT p.productID) FROM products p, tag_map tm, tags t WHERE tm.tagID = t.tagID
				AND p.productID = tm.productID
				AND (t.tag_name IN ('tea', 'leaf', 'leaves', 'loose'))
				AND p.availability = 1
				AND p.amount > 0";
				break;

			case 'teaware':
				$query_maxPage = "SELECT COUNT(DISTINCT p.productID) FROM products p, tag_map tm, tags t WHERE tm.tagID = t.tagID
				AND p.productID = tm.productID
				AND (t.tag_name IN ('teaware', 'teapot', 'cup', 'ceramic', 'porcelain'))
				AND p.availability = 1
				AND p.amount > 0";
				break;
			
			default:
				$query_maxPage = "SELECT COUNT(DISTINCT productID) FROM products WHERE availability = 1 AND amount > 0";
				break;
		}

	} else {
		$category = 'store';
		$query_maxPage = "SELECT COUNT(DISTINCT productID) FROM products WHERE availability = 1 AND amount > 0";
	}

	$sql_maxPage = mysqli_query($con, $query_maxPage);
	$row_maxPage = mysqli_fetch_array($sql_maxPage, MYSQLI_NUM);

	$maxPage = ceil($row_maxPage[0] / 9);

		echo('
			<nav class="store_pagination">
				<ul class="pagination pagination-lg justify-content-center">
		');

	if($page == 1){echo('<li class="page-item disabled">');}else{echo('<li class="page-item">');}
	
	echo('
			<a class="page-link" href="store.php?page=' . ($page - 1) . '&heading=' . $heading . '&category=' . $category .'">
				<i class="fas fa-angle-left"></i>
			</a>
		</li>
	');

	for ($i = 0; $i < 3; $i++){ 
		if(($page + $i) > $maxPage){echo('<li class="page-item disabled">');}else{echo('<li class="page-item">');}

		echo('
				<a class="page-link" href="store.php?page=' . ($page + $i) . '&heading=' . $heading . '&category=' . $category . '">' . ($page + $i)  . '</a>
			</li>
		');
	}

	if($page == $maxPage){echo('<li class="page-item disabled">');}else{echo('<li class="page-item">');}
	
	echo('
					<a class="page-link" href="store.php?page=' . ($page + 1) . '&heading=' . $heading . '&category=' . $category .'">
						<i class="fas fa-angle-right"></i>
					</a>
				</li>
			</ul>
		</nav>
	');
?>