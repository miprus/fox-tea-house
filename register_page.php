<?php
	require_once 'php/config/session_start.php';
	require_once 'php/config/db_con.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Michal Pruszkowski">
    <meta name="description" content="FoxTeaHouse - main registration page.">
    <meta name="keywords" content="FoxTeaHouse, tea, fox, teaware, teapot, online, shopping, buy, loose, leaves, leaf, cup, japanese, chinese, korean, green, puerh, yellow, black, white">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta name="robots" content="all">
    <title>Fox Tea House - Login</title>

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
	?>

    <header class="access_header mx-auto">
		<h1>Register</h1>
	</header>

	<form class="container-fluid mx-auto access_form validate" method="POST" action="php/register.php">

		<?php
			require_once 'php/config/validation_message.php';
		?>

		<div class="form-group">
			<h4><label for="first_name_register">First Name</label></h4>
			<input type="text" name="first_name" class="form-control form-control-lg" id="first_name_register" placeholder="Your first name" required>
		</div>

		<div class="form-group">
			<h4><label for="surname_register">Surname</label></h4>
			<input type="text" name="surname" class="form-control form-control-lg" id="surname_register" placeholder="Your surname" required>
		</div>

		<div class="form-group">
			<h4><label for="email_register">Email</label></h4>
			<input type="email" name="email" class="form-control form-control-lg" id="email_register" placeholder="Your email" required>
		</div>

		<div class="form-group">
			<h4><label for="username_register">Username</label></h4>
			<input type="text" name="username" pattern="^[a-zA-Z0-9]*$" title="Username can't contain any special characters or white spaces" class="form-control form-control-lg" id="username_register" placeholder="Your username" required>
		</div>

		<div class="form-group">
			<h4><label for="password_register">Password</label></h4>
			<input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain at least one number, one uppercase and lowercase letter, and be at least 8 or more characters" class="form-control form-control-lg" id="password_register" placeholder="Your password" required>
		</div>

		<div class="form-group">
			<h4><label for="passwordRe_register">Confirm Password</label></h4>
			<input type="password" name="passwordRe" class="form-control form-control-lg" id="passwordRe_register" placeholder="Repeat password" required>
		</div>
		
		<input type="submit" class="btn btn-lg" name="btn_register" value="Register">
	</form>

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