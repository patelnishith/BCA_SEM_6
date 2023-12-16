<?php session_start(); ?>
<?php include_once('./db_conf/connection.php') ?>

<?php
if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$select = "SELECT * FROM tbl_user_registration WHERE email='$email' AND is_super_admin=0";
	$check_select = mysqli_query($connection, $select);
	$count = mysqli_num_rows($check_select);
	if ($count > 0) {
		while ($response = mysqli_fetch_array($check_select)) {
			if (password_verify($password, $response['password'])) {
				$_SESSION['user_id'] = $response['id'];
				$_SESSION['is_user_login'] = true;
				header('location:index.php');
			} else {
?>
				<script>
					 alert("Your password is not match with given email");
				</script>
		<?php
			}
		}
	} else {
		?>
		<script>
			if(confirm("Your email is not exist you need to register your self"))
			{
			   window.location.href = './registration.php';
			}
			</script>
<?php
	}
}
?>

<?php include_once('nima_header.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="./assets/bootstrap/js/bootstrap.min.js">
	<link rel="stylesheet" href="./assets/fontawesome/free_font/css/all.min.css">
	<link rel="stylesheet" href="login.css">
	<link rel="stylesheet" href="style.css">
	<link rel="shortcut icon" href="./assets/image/logo.png" type="image/x-icon">


</head>

<body onload="loader_function()">
	<div id="loader"></div>
	<section class="loginForm w-100 d-flex align-items-center justify-content-center flex-column">
		<div class="loginInformation w-100 d-flex align-items-center justify-content-center">
			<form autocomplete="off" method="POST">
				<h2 class="font-weight-bold text-center"><i class="fas fa-users"></i>LogIn</h2>
				<div class="loginInputbox">
					<input type="email" name="email" required="required" class="w-100" value="<?php echo (isset($_POST['email'])) ? $_POST['email'] : ""  ?>">
					<span>Email</span>
				</div>
				<div class="loginInputbox">
					<input type="password" name="password" required="required" class="w-100" value="<?php echo (isset($_POST['password'])) ? $_POST['password'] : ""  ?>">
					<span>Password</span>
				</div>
				<div class="loginInputbox">
					<input type="submit" name="submit" value="LogIn" class="w-100  font-weight-bold">
				</div>
			</form>
		</div>
	</section>
</body>

</html>
<!-- loader script start ---------------------------------------->
<script>
	var preloader = document.getElementById('loader');

	function loader_function() {
		preloader.style.display = 'none';
	}
</script>
<!-- loader script end ------------------------------------------>
<?php include_once('nima_footer.php') ?>
