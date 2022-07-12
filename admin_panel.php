<?php
	require_once 'php/config/session_start.php';
	require_once 'php/config/db_con.php';

	if($member_type !== 'admin'){
		header('Location: index.php');
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Michal Pruszkowski">
    <meta name="description" content="FoxTeaHouse - Admin Panel">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta name="robots" content="noindex, nofollow">
    <title>Fox Tea House - Admin</title>

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
		require_once 'php/nav/side_nav.php';
	?>
    <article class="m-5">
        <h2>Admin Panel - Guide</h2>
        <hr>
			<p>The following guide provides summary of how to use available tools for effective management of database content. For easier navigation, additional navigation menu can be found on the top left corner.</p>

			<h5>Adding New Product</h5>
			<p>First, navigate to section 'Add New Product'. This section consists of 5 text fields, 4 dropdowns with options and 1 button. Fill each text field with relevant information, then select appropriate option from each dropdown. Finally, click 'Add' button to create new entry in database and add new product to the store.</p>
			<ul>
				<li>Product Name - this field should contain the name of new product. In case when there are multiple variation on one product (e.g. various package sizes of one tea) additional detail should be included in product name. For example: 'White Tea Leaves 100g' and 'White Tea Leaves 200g'.</li>
				<li>Stock Amount - number indicating available units of product for sale.</li>
				<li>Price(£) - the price of 1 unit of product in British pound sterling.</li>
				<li>Discount (%) - if you wish to offer a discount for this product enter desirable amount between 0 - 100. For example: 0 means 0% of discount - no discount, 30 means 30% of discount (product with price £10.00 will cost £7.00)</li>
				<li>Product Description - text with any valuable details describing a product.</li>
				<li>Availability - products with option 'Yes' selected are displayed in the store and customers can buy this product. Option 'No' will hide this product from store making it unable to buy.</li>
				<li>Featured - make this product be seen at home page. Option 'Yes' will show this product on the home page, while option 'No' will not.</li>
				<li>Star Rating - purely cosmetic feature providing additional way to advertise a product. Select between 1 and 5 stars that will be displayed near product info.</li>
				<li>Tags - this is essential feature that allows system to group individual products based on their common feature (e.g. colour, type, material) and recommend other products to a customer based on his previous orders. It is advised that each product have at least 2-3 tags assigned to it.</li>
				<li>'Add' Button - creates new entry in database and adds this product to the store.</li>
			</ul>

			<p>After adding new product to the store, an images should be assigned to this product. It's not essential but will enhance presentation of the product to a customer. To add new image:</p>
			<ul>
				<li>Navigate to 'Images' section and locate product name of the product to which you wish to add an image. If a product does not have an image assigned to it, a red text will be displayed: "No images for this product in database yet!".</li>
				<li>Click "Choose file" button under the name of desired product. New widow will popup where you can search and choose an image from your device. It is important to note: 
				<ul>
					<li>Supported file extensions: JPG, JPEG, PNG, GIF, TIFF and SVG</li>
					<li>Allowed max file size is 2MB</li>
				</ul>
				<li>After an image was selected, click the 'Upload' button to upload an image.</li>
				<li>You can repeat above steps to add as many images as necessary.</li>
			</ul>

			<h5>Deleting Images</h5>
			<p>In order to delete an image, simply navigate to 'Images' section. Then search for desired image and click 'Delete' button beneath it.</p>
			<h5>Updating Details of Existing Product</h5>

			<p>The product updating process is similar to process of adding new product. First, navigate to section 'Products'. This section consists of a list of all products. Each product have 5 text fields, 4 dropdowns with options and 1 button. Alter information in each desired text field with relevant information, then select new, appropriate option from each dropdown if needed. Finally, click 'Save' button to update product details in database.</p>
			<ul>
				<li>Product Name - this field should contain the name of new product. In case when there are multiple variation on one product (e.g. various package sizes of one tea) additional detail should be included in product name. For example: 'White Tea Leaves 100g' and 'White Tea Leaves 200g'.</li>
				<li>Stock Amount - number indicating available units of product for sale.</li>
				<li>Price(£) - the price of 1 unit of product in British pound sterling.</li>
				<li>Discount (%) - if you wish to offer a discount for this product enter desirable amount between 0 - 100. For example: 0 means 0% of discount - no discount, 30 means 30% of discount (product with price £10.00 will cost £7.00)</li>
				<li>Product Description - text with any valuable details describing a product.</li>
				<li>Availability - products with option 'Yes' selected are displayed in the store and customers can buy this product. Option 'No' will hide this product from store making it unable to buy.</li>
				<li>Featured - make this product be seen at home page. Option 'Yes' will show this product on the home page, while option 'No' will not.</li>
				<li>Star Rating - purely cosmetic feature providing additional way to advertise a product. Select between 1 and 5 stars that will be displayed near product info.</li>
				<li>Tags - this is essential feature that allows system to group individual products based on their common feature (e.g. colour, type, material) and recommend other products to a customer based on his previous orders. It is advised that each product have at least 2-3 tags assigned to it.</li>
				<li>'Add' Button - creates new entry in database and adds this product to the store.</li>
			</ul>

			<h5>Creating and Deleting Tags</h5>
			<p>To created new tag, navigate to 'Tags' section. In 'tag name' filed enter new tag. Then click 'Save' button to add new tag to database. All available tags are displayed below. To delete a tag, click cross icon located inside green box and next to tag name.</p>

			<h5>Creating New Admin User</h5>
			<p>Creation of admin user is similar to the main registration process. Navigate to 'Add New Admin' section. Fill out all fields with relevant information and then click 'Register' button. Notice the word 'admin@' already being entered inside the 'Username' field. This is prefix that distinguish admin users from others. You can't modify it, but simply add your user name after 'admin@'. For example, admin@tea_lover12. Remember to log-in as an admin us username with 'admin@' prefix.</p>

			<h5>Orders and Users Lists</h5>
			<p>Sections 'Orders' and 'Users' displays - respectively - registered users (including administrators) and any product that was being purchase.</p>
    </article>

    <hr class="line_orange">

	<article class="m-5">
		<h2 id="Products">Products</h2>
			<?php
				require 'php/config/validation_message.php';
				require_once 'php/elements/admin_products.php';
			?>
	</article>

	<hr class="line_orange">

	<article class="m-5">
		<h2 id="Add_New_Product">Add New Product</h2>
			<?php
				require 'php/config/validation_message.php';
			?>
		<form class="validate" method="POST" id="form_0" action="php/admin/new_product.php">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th scope="col" style="width:24vw;">Product Name</th>
							<th scope="col" style="width:4vw;">Stock Amount</th>
							<th scope="col" style="width:10vw;">Price (£)</th>
							<th scope="col" style="width:2vw;">Discount (%)</th>
							<th scope="col" style="width:24vw;">Product Description</th>
							<th scope="col" style="width:8vw;">Availability</th>
							<th scope="col" style="width:8vw;">Featured</th>
							<th scope="col" style="width:8vw;">Star Rating</th>
							<th scope="col" style="width:8vw;">Tags</th>
							<th scope="col"></th>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td><input type="text" name="new_product_name" class="form-control" form="form_0" required></td>
							<td><input type="text" name="new_amount" class="form-control" pattern="^[0-9]*$" form="form_0" required></td>
							<td><input type="text" name="new_price" class="form-control" pattern="(?=.*\d)+^[0-9.]*$" form="form_0" required></td>
							<td><input type="text" name="new_discount" class="form-control" pattern="^[0-9]*$" form="form_0" required></td>
							<td><textarea name="new_description" class="form-control" rows="4" form="form_0" required></textarea></td>
							<td>
								<select name="new_availability" class="form-control" form="form_0" required>
									<option value="1">Yes</option>
									<option value="0">No</option>
								</select>
							</td>
							<td>
								<select name="new_featured" class="form-control" form="form_0" required>
									<option value="0">No</option>
									<option value="1">Yes</option>
								</select>
							</td>
							<td>
								<select name="new_rating" class="form-control" form="form_0" required>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
							</td>
							<td>
								<!--Displaying tag dropdown - php/elements/tags_dropdown.php-->
								<?php tagsDropdown_update(0, 'new_tags[]')?>
							</td>
							<td><input type="submit" class="btn btn-lg" name="add_product" value="Add" form="form_0"></td>	
						</tr>
					</tbody>
				</table>
			</div>
		</form>
	</article>

    <hr class="line_orange">


    <article class="m-5 admin_images">
        <h2 id="Images">Images</h2>

        <hr>
            <?php
				require 'php/config/validation_message.php';
                require_once 'php/elements/admin_images.php';
            ?>
    </article>

    <hr class="line_orange">


    <article class="m-5">
        <h2 id="Tags">Tags</h2>

		<hr>
			<?php
				require 'php/config/validation_message.php';
			?>

        <form class="validate form-inline mb-5" method="POST" action="php/admin/new_tag.php">
            <div class="form-group mx-sm-3 mb-2">
                <label for="new_tag" class="mr-2">New Tag:</label>
                <input type="text" name="new_tag" id="new_tag" class="form-control" placeholder="tag name" required>
            </div>
            <input type="submit" class="btn btn-lg" name="add_tag" value="Save">
        </form>

        <?php
            require_once 'php/elements/admin_tags.php';
        ?>
    </article>

	<hr class="line_orange">
	

    <article class="m-5">
		<h2 id="Add_New_Admin">Add New Admin</h2>
		
		<form class="container-fluid mx-auto access_form validate" method="POST" action="php/register.php">
		<?php
			require 'php/config/validation_message.php';
		?>

			<div class="form-group">
				<h4><label for="admin_first_name_register">First Name</label></h4>
				<input type="text" name="first_name" class="form-control form-control-lg" id="admin_first_name_register" placeholder="Your first name" required>
			</div>

			<div class="form-group">
				<h4><label for="admin_surname_register">Surname</label></h4>
				<input type="text" name="surname" class="form-control form-control-lg" id="admin_surname_register" placeholder="Your surname" required>
			</div>

			<div class="form-group">
				<h4><label for="admin_email_register">Email</label></h4>
				<input type="email" name="email" class="form-control form-control-lg" id="admin_email_register" placeholder="Your email" required>
			</div>

			<div class="form-group">
				<h4><label for="admin_username_register">Username</label></h4>
				<input type="text" name="username" pattern="[a-zA-Z0-9@]+[a-zA-Z0-9]" title="Username can't contain any special characters or white spaces and must start with 'admin@'" class="form-control form-control-lg" id="admin_username_register" value="admin@" placeholder="Your username" required>
			</div>

			<div class="form-group">
				<h4><label for="admin_password_register">Password</label></h4>
				<input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain at least one number, one uppercase and lowercase letter, and be at least 8 or more characters" class="form-control form-control-lg" id="admin_password_register" placeholder="Your password" required>
			</div>

			<div class="form-group">
				<h4><label for="admin_passwordRe_register">Confirm Password</label></h4>
				<input type="password" name="passwordRe" class="form-control form-control-lg" id="admin_passwordRe_register" placeholder="Repeat password" required>
			</div>
			
			<input type="submit" class="btn btn-lg" name="btn_admin_register" value="Register">
		</form>
    </article>

	<hr class="line_orange">


    <article class="m-5"> 
        <h2 id="Orders">Orders</h2>
            <?php
                require_once 'php/elements/admin_orders.php';
            ?>
    </article>

    <hr class="line_orange">


    <article class="m-5">
        <h2 id="Users">Users</h2>
            <?php
                require_once 'php/elements/admin_users.php';
            ?>
    </article>

    <hr class="line_orange">


    <article class="m-5">
        <h2>Addresses</h2>
            <?php
                require_once 'php/elements/admin_addresses.php';
            ?>
    </article>

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
    <script src="js/admin_nav.js"></script>
    <script src="js/form_validation.js"></script>

	<script>
	//script for highlighting checked checkboxes inside of tag dropdowns
		$(document).ready(function(){

			$('input[type=checkbox]:checked').parent().addClass("active");

			$("input[type=checkbox]").click(function(){
				if($(this).is(":checked")){
					$(this).parent().addClass("active");
				}
				else if($(this).is(":not(:checked)")){
					$(this).parent().removeClass("active");
				}
			});

	//script for adding prefix to admin username
	//snippet from https://stackoverflow.com/questions/9468098/how-to-add-a-permanent-prefix-to-a-textbox-using-jquery
			$("#admin_username_register").on("keyup mouseup blur", function(){
			var prefix = 'admin@';
			
				if(this.value.substring(0, prefix.length) != prefix){
					$('#admin_username_register').val(prefix);
				}
			});
		});

	//script for previewing image after selecting it
	//snippet from https://stackoverflow.com/questions/35453944/javascript-image-preview-on-multiple-input-files
		function readURL(){
			var $input = $(this);
			if(this.files && this.files[0]){
				var reader = new FileReader();

				reader.onload = function(e){
					$input.nextAll('.img_preview').attr('src', e.target.result).show();
					$input.nextAll('.img_preview').attr('alt', e.target.result).show();
				}

				reader.readAsDataURL(this.files[0]);
			}
		}

		$(".upload_input").change(readURL);
	</script>
</body>
</html>