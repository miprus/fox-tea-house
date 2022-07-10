<?php
    $query_tags = "SELECT * FROM tags ORDER BY tag_name";
    $sql_tags = mysqli_query($con, $query_tags);

    echo('
        <div class="d-flex flex-wrap">
    ');

    while($rowTags = mysqli_fetch_array($sql_tags, MYSQLI_ASSOC)){
		echo('
			<form class="validate" method="POST" action="php/admin/delete_tag.php">
				<div class="tag">
					<input type="hidden" name="tag_id" value="' . $rowTags['tagID'] . '">' . $rowTags['tag_name'] . '<button type="submit" name="delete_tag"><i class="fas fa-times-circle"></i></button>
				</div>
			</form>
       ');
    }

    echo('
         </div>
    ');
?>