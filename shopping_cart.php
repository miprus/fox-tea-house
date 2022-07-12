<?php
	require_once 'php/config/session_start.php';
	require_once 'php/config/db_con.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Michal Pruszkowski">
    <meta name="description" content="FoxTeaHouse - dynamic shopping cart page.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta name="robots" content="noindex, nofollow">
    <title>Fox Tea House - Cart</title>

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

	<article class="cart_box">
		<h2 class="text-center mt-5">Your Shopping Cart</h2>
		
		<?php
			require_once 'php/config/validation_message.php';
			require_once 'php/elements/get_cart_items.php';
		?>
	</article>

    <?php
    	require_once 'php/elements/footer.php';
    ?>
</main>
    <!--Bootstrap libraries-->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
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
	<script>
		$(document).ready(function(){
			var itemQty_original;

			$("input[name='checkoutItems[itemQty][]']").focus(function(){
				itemQty_original = $(this).val();	
			});

			$("input[name='checkoutItems[itemQty][]']").change(function(){
				var itemID = $(this).prevAll("input[name='checkoutItems[itemID][]']").val();
				var itemQty = $(this).val();
					
				if(itemQty < 1){
					alert('This field cannot contain value lower than 1');
					$(this).val(itemQty_original);
	
				} else {
					$("#total_price").load('php/config/update_cart.php', {"itemID" : itemID, "itemQty" : itemQty});
				}	
			});

		$(".sub_btn").click(function(){
			var itemID = $(this).parent().nextAll("input[name='checkoutItems[itemID][]']").val();
			var itemQty = $(this).parent().nextAll("input[name='checkoutItems[itemQty][]']").val();
			itemQty = parseInt(itemQty, 10);

			if(itemQty > 1){
				itemQty -= 1;
				$(this).parent().nextAll("input[name='checkoutItems[itemQty][]']").val(itemQty);
				$("#total_price").load('php/config/update_cart.php', {"itemID" : itemID, "itemQty" : itemQty});

			} else {
				$(this).parent().nextAll("input[name='checkoutItems[itemQty][]']").val(1);
			}
		});

		$(".add_btn").click(function(){
			var itemID = $(this).parent().prevAll("input[name='checkoutItems[itemID][]']").val();
			var itemQty = $(this).parent().prevAll("input[name='checkoutItems[itemQty][]']").val();
			itemQty = parseInt(itemQty, 10);

			if(itemQty >= 1){
				itemQty =  itemQty + 1;

				$(this).parent().prevAll("input[name='checkoutItems[itemQty][]']").val(itemQty);
				$("#total_price").load('php/config/update_cart.php', {"itemID" : itemID, "itemQty" : itemQty});

			} else {
				$(this).parent().prevAll("input[name='checkoutItems[itemQty][]']").val(1);
			}
		});
	});
	</script>
</body>
</html>