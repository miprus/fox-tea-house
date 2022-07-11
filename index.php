<?php
	require_once 'php/config/session_start.php';
	require_once 'php/config/db_con.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Michal Pruszkowski">
    <meta name="description" content="At FoxTeaHouse you can search thorough our best products. We offer variety of loose leaf teas and teaware.">
    <meta name="keywords" content="FoxTeaHouse, tea, fox, teaware, teapot, online, shopping, buy, loose, leaves, leaf, cup, japanese, chinese, korean, green, puerh, yellow, black, white">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta name="robots" content="all">
    <title>Fox Tea House - Home Page</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Lato|Merienda&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="library/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="library/owlcarousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/animate.css">
	
	<script type="application/ld+json">
		{
			"@context": "http://schema.org",
			"@type": "Organization",
			"name": "FoxTeaHouse",
			"url": "http://michalpruszkowski.com/index.php",
			"sameAs": [
			"https://www.facebook.com/groups/254859652580304"
			]
		}
	</script>
</head>

<body>
<main class="container-fluid">
	<?php
		require_once 'php/nav/top_section.php';
		require_once 'php/elements/heading.php';
	?>

    <section class="home_carousel">
		<div class="d-flex justify-content-center my-3 pt-5">
			<h1>Our Top Products</h1>
		</div>
        <div class="owl-carousel">
			<?php
				$product_display = 'home_page';
				require_once 'php/elements/get_featured_product.php';
			?>
    	</div>
	</section>
	
	<article class="row text-center summary_article">
		<section class="col-sm-4 summary_section wow fadeInUp">
			<a href="register_page.php">
				<i class="fas fa-user-plus"></i>
				<h2>Join To Us!</h2>
			</a>
			<p>Become member of the FoxTeaHouse and gain access to personalised profile page where you can manage your account details and track your orders!</p>
		</section>

		<section class="col-sm-4 summary_section wow fadeInUp">
			<a href="store.php?page=1&heading=store">
				<i class="fas fa-shopping-bag"></i>
				<h2>Our Products</h2>
			</a>
			<p>Explore our wide range of products. From loose leaf tea to teaware. Here you can find everything you are looking for and you don't have to pay extra for shipping!</p>
		</section>

		<section class="col-sm-4 summary_section wow fadeInUp">
			<a href="policy.php">
				<i class="fas fa-shipping-fast"></i>
				<h2>Return Policy</h2>
			</a>
			<p>Were you unhappy with your order? Do you need to return it? Check our return policy.</p>
		</section>
	</article>

    <article class="about_article">
		<h2 class="wow fadeInLeft">"Where It All Starts With a Cup of Tea"</h2>
		<hr>
		<p class="wow fadeIn">We are dedicated to our motives and believes that any journey should start with a cup of worm tea. Thus we hope you will think of FoxTeaHouse in a matter of such journey. Discover our wide range of products. Here you can find best selection of loose leaf teas and an excellent quality of equipment. Our service is driven by a passion for harmonious nature of brewing tea. We value all aspects of tea, especially its healing and relaxing sides. When you think about it in this way, you may experience whole new meaning of a single cup of tea. 
		<br><br>
		From the ancient times people were mastering the art of tea. Studying it and benefit from its features. As the time was passing, tea has become an integral part of many Asian cultures. From Japan, through Korea to China. From India to Anatolia and Russia. Those and many other cultures has mastered the art of tea in their own very special way. They have developed different way of brewing tea leaves that was influenced by their region. It’s fascinating in how many various ways an individual is able to taste just one type of tea. In how many ways one can embraced its own journey.
		<br><br>
		FoxTeaHouse, inspired by those cultures and arts, has created their own art of tea. Now we truly wish to share our way of looking at tea to you. Allow us to inspire you as much as we were inspired. Learn more about tea by experience it and master your own art of tea.</p>

		<div class="d-flex justify-content-center wow fadeInUp">
			<img src="img/logo/fth_logo.svg" alt="fth main logo" class="logo_main">
		</div>
	</article>

    <article class="row justify-content-center find_article">
        <section class="col-md-6 text-center media_section">
		<a href="https://www.facebook.com/groups/254859652580304" target="_blank">
			<i class="fab fa-facebook-square"></i>
			<h3>Follow Us On Facebook</h3>
		</a>
			<p>Be first to discover new promotions and fresh news from our official Facebook page.</p>
		</section>

        <section class="col-md-6 address_section">
			<div class="media row">
				<div class="col-md-6">
					<div class="media-body text-right pr-4">
						<h3 class="mt-0">Address</h3>
						<hr>
						<ul>
							<li>Country: United Kingdom</li>
							<li>City: Edinburgh</li>
							<li>Address: 20 Leven St</li>
							<li>Post code: EH3 9LJ</li>
							<li>Email: ft.house@gmail.co.uk</li>
							<li>Tel: 0123 456 7890</li>
						</ul>
					</div>
				</div>

				<div class="col-md-6 d-flex justify-content-center">
					<img src="img/map/ft_map.png" class="align-self-center mr-3" alt="FoxTeaHose venue map">
				</div>
			</div>
		</section>
	</article>

    <?php
		require_once 'php/elements/cookie_notify.php';
		require_once 'php/elements/footer.php';
    ?>
</main>
    <!--Bootstrap libraries-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!--other js libraries-->
	<script src="https://kit.fontawesome.com/50dad09a73.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/popper.js@1"></script>
    <script src="https://unpkg.com/tippy.js@5"></script>
	<script src="library/owlcarousel/owl.carousel.min.js"></script>
	<script src="library/wowjs/wow.min.js"></script>
	<!--custom scripts-->
	<script src="js/master_nav.js"></script>
	<script src="js/form_validation.js"></script>
    <script>
		////////wow JS////////
		new WOW().init();

		////////Owl carousel////////
        $(document).ready(function(){
            $('.owl-carousel').owlCarousel({
				loop: true,
				nav: true,
				autoWidth: true,
				center: true,
				items: 5,
                navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
            })
        });

		////////Tippy tooltip////////
		tippy('#register_tooltip', {
				showOnCreate: true,
				content: 'You are not our member yet! Register here!',
				duration: [600, 500],
			});
    </script>
</body>
</html>