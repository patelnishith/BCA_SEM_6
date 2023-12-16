<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../assets/fontawesome/free_font/css/all.min.css">
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/bootstrap/js/bootstrap.min.js">
	<link rel="stylesheet" href="admin_aside.css">
</head>

<body>
	<aside>
		<ul>
			<li class="active" id="dashboard"><a href="admin_index.php"><i class="fas fa-tachometer-alt"></i>dashboard</a></li>
			<li id="users"><a href="admin_users.php?user_type=0"><i class="fas fa-users"></i>users</a></li>
			<li id="superusers"><a href="admin_users.php?user_type=1"><i class="fas fa-user"></i>super admin</a></li>
			<li id="feedback"><a href="admin_feedback.php"><i class="fas fa-comments"></i>contact us</a></li>
			<li id="mobiles"><a href="mobile_list.php"><i class="fas fa-mobile-alt"></i>mobiles</a></li>
			<li id="laptops"><a href="laptop_list.php"><i class="fas fa-laptop"></i>laptops</a></li>
			<li id="mobiles_order"><a href="mobiles_order.php"><i class="fas fa-mobile-alt" aria-hidden="true"></i>mobiles order</a></li>
			<li id="laptops_order"><a href="laptops_order.php"><i class="fas fa-laptop"></i>laptops order</a></li>
			<li id="logout"><a href="admin_logout.php"><i class="fas fa-sign-in-alt"></i>logout</a></li>
		</ul>
	</aside>
</body>

</html>