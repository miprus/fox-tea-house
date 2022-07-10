<?php
	require_once 'php/config/session_start.php';
	require_once 'php/config/db_con.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Michal Pruszkowski">
    <meta name="description" content="FoxTeaHouse - dynamic product info page.">
    <meta name="keywords" content="FoxTeaHouse, tea, fox, teaware, teapot, online, shopping, buy, loose, leaves, leaf, cup, japanese, chinese, korean, green, puerh, yellow, black, white">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta name="robots" content="all">
    <title>Fox Tea House - Product Page</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Lato|Merienda&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="library/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="library/owlcarousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<main class="container-fluid">
	<?php
		$product_display = 'product_info';
		require_once 'php/nav/top_section.php';
		require_once 'php/config/validation_message.php';
		require_once 'php/elements/get_product_info.php';
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
	<script>
		function showImage(image){
			var expandImg = document.getElementById("expandedImg");

			expandImg.src = image.src;
			expandImg.alt = image.src;
			expandImg.parentElement.style.display = "block";
		}
	</script>
</body>
</html>