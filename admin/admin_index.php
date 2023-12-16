<?php
  session_start();
  if ($_SESSION['is_admin_login'] != true) {
	header('location: admin_login.php');
  }
?>

<?php include_once('admin_header.php') ?>
<?php include_once('admin_aside.php') ?>
<?php include_once('../db_conf/connection.php') ?>

<?php

//for dashboard count start

$user_query = "SELECT * FROM tbl_user_registration";
$user_query_result = mysqli_query($connection, $user_query);
$user_count = mysqli_num_rows($user_query_result);

$user_fdk_query = "SELECT * FROM tbl_contact";
$user_fdk_query_result = mysqli_query($connection, $user_fdk_query);
$user_fdk_count = mysqli_num_rows($user_fdk_query_result);

$added_mobiles = "SELECT * FROM tbl_mobiles";
$added_mobiles_result = mysqli_query($connection, $added_mobiles);
$added_mobiles_count = mysqli_num_rows($added_mobiles_result);

$added_laptop="SELECT * FROM tbl_laptops";
$added_laptop_result=mysqli_query($connection,$added_laptop);
$added_laptop_count=mysqli_num_rows($added_laptop_result);

// for dashboard count end
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/bootstrap/js/bootstrap.min.js">
	<link rel="stylesheet" href="../assets/fontawesome/free_font/css/all.min.css">
	<link rel="stylesheet" href="admin_style.css">
	<link rel="shortcut icon" href="./assets/image/logo.png" type="image/x-icon">
</head>
<body>
<!-- today activity start -->

<div class="d-flex flex-column w-100">
<div class="admin-container container-fluid w-100">
<h1 class="mt-5 ml-4 text-capitalize pb-3 font_de">all activity</h1>
		<div class="h-25 w-100  row d-flex align-items-center pl-4 flex-row">
			<a href="admin_users.php?user_type=0" class="admin-data-con  py-3 mx-3 mt-2 mt-lg-0 col-xl-2 col-lg-2  col-md-4 col-sm-6 col-10 bg-white d-flex justify-content-around align-items-center">
				<div class="admin-card-icon">
					<i class="fas fa-users" style="font-size: 3rem;"></i>
				</div>
				<div class="admin-card-data d-flex  align-items-end flex-column">
					<p>Users</p>
					<h2><?php echo $user_count ?></h2>
				</div>
			</a>
			<a href="admin_feedback.php" class="admin-data-con py-3 mx-3 mt-lg-0 mt-2 col-xl-2 col-lg-2 col-md-4 col-sm-6 col-10 bg-white d-flex justify-content-around align-items-center">
				<div class="admin-card-icon">
					<i class="fas fa-comments" style="font-size: 3rem;"></i>
				</div>
				<div class="admin-card-data d-flex  align-items-end flex-column">
					<p>Contact US</p>
					<h2><?php echo $user_fdk_count ?></h2>
				</div>
			</a>
			<a href="mobile_list.php" class="admin-data-con py-3 mt-2 mx-3 mt-lg-0 col-xl-2 col-lg-2 col-md-4 col-sm-6 col-10 bg-white d-flex justify-content-around align-items-center">
				<div class="admin-card-icon">
					<i class="fas fa-mobile-alt" style="font-size: 3rem;"></i>
				</div>
				<div class="admin-card-data d-flex  align-items-end flex-column">
					<p>Mobiles</p>
					<h2><?php echo $added_mobiles_count ?></h2>
				</div>
			</a>
			<a href="laptop_list.php" class="admin-data-con py-3 mx-3  mt-2 col-xl-2 col-lg-2 col-md-4 col-sm-6 col-10 mt-lg-0 bg-white d-flex justify-content-around align-items-center">
				<div class="admin-card-icon ">
					<i class="fas fa-laptop" style="font-size: 3rem;"></i>
				</div>
				<div class="admin-card-data d-flex  align-items-end flex-column">
					<p>Laptops</p>
					<h2><?php echo $added_laptop_count ?></h2>
				</div>
			</a>
		</div>
	</div>
</div>
	<!-- admin card end -->
</body>

</html>
