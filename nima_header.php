<?php include_once('./db_conf/connection.php');
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="./assets/fontawesome/free_font/css/all.min.css">
	<link rel="stylesheet" href="nima_header.css">
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<nav class="navbar  navbar-expand-lg fixed-top">
		<div class="container-fluid">
			<a href="#" class="navbar-brand logo"><img src="./assets/image/logo.png" alt=""></a>
			<button class="navbar-toggler custom-toggler  mr-2 pt-2" data-toggle="collapse" data-target="#navid">
				<span class="navbar-toggler-icon"><i class="fas fa-bars" style="color:#fff"></i></span>
			</button>
			<div class="collapse navbar-collapse" id="navid">
				<ul class="navbar-nav  ml-auto text-center">
					<li class="nav-item"><a href="index.php" class="nav-link  text-white"><i class="fas fa-home pr-1" style="color: #fff"></i>Home</a></li>
					<li class="nav-item"><a href="mobiles_ui.php" class="nav-link  text-white"><i class="fas fa-mobile-alt pr-1" style="color: #fff"></i>Phones</a></li>
					<li class="nav-item"><a href="laptops_ui.php" class="nav-link  text-white"><i class="fas fa-laptop pr-1" style="color: #fff"></i>Laptops</a></li>

					
					<li class="nav-item"><a href="contact.php" class="nav-link  text-white"><i class="fas fa-envelope pr-1"></i>Contact Us</a></li>
					<?php
					if (!empty($_SESSION['is_user_login'])) {
						$login_id = $_SESSION['user_id'];
						$select_cart = "SELECT * FROM tbl_user_cart WHERE user_id=$login_id";
						$check_cart = mysqli_query($connection, $select_cart);
						$count_product = mysqli_num_rows($check_cart);
					
						$select_orders = "SELECT * FROM tbl_orders WHERE user_id=$login_id";
						$check_orders = mysqli_query($connection, $select_orders);
						$count_orders_product = mysqli_num_rows($check_orders);
					?>
						<li class="nav-item"><a href="view_cart.php" class="btn1 nav-link text-white"><i class="fas fa-shopping-cart pr-1" title="cart"></i><sup><?php echo $count_product ?></sup></a></li>
						<li class="nav-item"><a href="user_orders.php" class="btn1 nav-link text-white"><i class="fab fa-first-order" aria-hidden="true"></i><sup><?php echo $count_orders_product ?></sup></a></li>
						<li class="nav-item"><a href="user_logout.php" class="btn2 nav-link text-white"><i class="fas fa-sign-in-alt" title="log out"></i></a></li>
						<li class="nav-item"><a href="update_user.php" class="btn2 nav-link text-white"><i class="fas fa-user-cog" title="update your profile"></i></a></li>

					<?php
					}
					?>
				</ul>
			</div>
		</div>
	</nav>
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>