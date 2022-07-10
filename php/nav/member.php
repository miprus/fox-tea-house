<?php
	echo('
		<nav class="main_nav" id="master_nav">
			<a href="index.php" class="active"><img src="img/logo/fth_logo.svg" alt="fth logo" class="logo_nav"> FoxTeaHouse</a>
			<a href="store.php?page=1&heading=store">Shop Now</a>
			<a href="store.php?page=1&heading=tea&category=tea">Tea</a>
			<a href="store.php?page=1&heading=teaware&category=teaware">Teaware</a>
			<a href="profile.php?heading=profile">My Profile</a>
			<a href="php/config/session_end.php">Logout</a>
			<a href="javascript:void(0);" class="bars" onclick="masterNav()">
				<i class="fa fa-bars"></i>
			</a>
		</nav>
	');
?>