<?php
	if(isset($_COOKIE["user_" . $userID . "_cart"])){
		$cart = json_decode($_COOKIE["user_" . $userID . "_cart"], true);

		$cartItemsAmount = count($cart);
	} else {
		$cartItemsAmount = 0;
	}


		switch ($member_type){
			case 'member':
				echo('
					<aside class="top_aside">
						<a href="shopping_cart.php"><i class="fas fa-shopping-cart"></i> Cart <span class="badge badge-light">' . $cartItemsAmount .'</span></a>
					</aside>
				');

				require 'php/nav/member.php';
				break;

			case 'admin':
				echo('
					<aside class="top_aside">
						<a href="admin_panel.php"><i class="fas fa-cogs"></i> Admin Panel</a>
						<a href="shopping_cart.php"><i class="fas fa-shopping-cart"></i> Cart <span class="badge badge-light">' . $cartItemsAmount .'</span></a>
					</aside>
				');

				require 'php/nav/member.php';
				break;
		
			default:
				echo('
					<aside class="top_aside">
						<a href="register_page.php" id="register_tooltip">Register</a>
						<a href="shopping_cart.php"><i class="fas fa-shopping-cart"></i> Cart <span class="badge badge-light">' . $cartItemsAmount .'</span></a>
					</aside>
				');

				require 'php/nav/guest.php';
				break;
		}		
    ?>