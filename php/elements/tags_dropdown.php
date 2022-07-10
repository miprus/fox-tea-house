<?php
	function tagsDropdown_update($productID, $input_name){
		global $con;

		$query_productTags = "SELECT t.* FROM tags t, tag_map tm WHERE t.tagID = tm.tagID AND tm.productID = '$productID'";
		$sql_productTags = mysqli_query($con, $query_productTags);

		$productTags = array();

		while($rowProductTags = mysqli_fetch_array($sql_productTags, MYSQLI_ASSOC)){
			array_push($productTags, $rowProductTags['tag_name']);
		}

		echo('
			<div class="dropdown">
				<button class="btn dropdown-toggle" type="button" data-toggle="dropdown" data-boundary="window">Tags</button>

				<div class="dropdown-menu">
		');

		$query_allTags = "SELECT * FROM tags ORDER BY tag_name";
		$sql_allTags = mysqli_query($con, $query_allTags);

		while($rowAllTags = mysqli_fetch_array($sql_allTags, MYSQLI_ASSOC)){
			echo('
				<div class="form-check px-5 py-2">
					<input id="tag-' . $rowAllTags['tagID'] . '-' . $productID . '" class="form-check-input" form="form_' . $productID .'" type="checkbox" name="' . $input_name . '" value="' . $rowAllTags['tagID'] . '"
			');

				if(false !== array_search($rowAllTags['tag_name'], $productTags)){
					echo(' checked');
				}

			echo('
				>
					<label class="form-check-label" for="tag-' . $rowAllTags['tagID'] . '-' . $productID . '">' . $rowAllTags['tag_name'] . '</label>
				</div>
			');
		}

		echo('	
				</div>
			</div>
		');
	}
?>