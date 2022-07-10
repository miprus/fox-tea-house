<?php
	echo('
        <nav id="admin_nav" class="side_nav">
            <a href="javascript:void(0)" onclick="closeNav()"><i class="far fa-times-circle"></i></a>
            <a href="#" onclick="closeNav()">Back To Top</a>
			<a href="#Products" onclick="closeNav()">Products</a>
			<a href="#Add_New_Product" onclick="closeNav()">Add New Product</a>
            <a href="#Images" onclick="closeNav()">Images</a>
			<a href="#Tags" onclick="closeNav()">Tags</a>
			<a href="#Add_New_Admin" onclick="closeNav()">Add New Admin</a>
            <a href="#Orders" onclick="closeNav()">Orders</a>
            <a href="#Users" onclick="closeNav()">Users</a>
        </nav>

    <aside class="side_nav_icon">
        <i class="fas fa-bars" style="cursor:pointer" onclick="openNav()"></i>
    </aside>
	');
?>