<?php
	require_once 'php/config/session_start.php';
	require_once 'php/config/db_con.php';

	if($member_type == 'guest'){
		header('Location: index.php');
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Michal Pruszkowski">
    <meta name="description" content="FoxTeaHouse - user progfile page.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta name="robots" content="noindex, nofollow">
    <title>Fox Tea House - Profile</title>

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
		require_once 'php/elements/heading.php';
	?>

	<article class="profile_section">
		<h2>Welcome to your profile.</h2>
		<hr>
		<p>Your personal profile page provides tools that will help you in managing your data. There are three bookmarks:
			<ul>
				<li>
					<em>Personal Details<em> allow you to change your username, name and surname as well as update your email. 
				</li>
				<li>
					<em>Change Password<em> provides you the ability to change your password without need to contact website administrator. It's easy and quick!
				</li>
				<li>
					<em>Address</em> - this bookmark shows the address that will be displayed during checkout process. You can save you address here for future purchases.
				</li>
			</ul>
		</p>
	</article>

    <?php
        require_once 'php/elements/user_details.php';
    ?>

	<hr class="line_orange">

	<section class="profile_orders table-responsive-sm">
		<h2>Order History</h2>
		<br>
		<?php
			require_once 'php/elements/get_order_history.php';
		?>
	</section>
	
    <?php
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
	<!--custom scripts-->
	<script src="js/master_nav.js"></script>
	<script src="js/form_validation.js"></script>
</body>
</html>