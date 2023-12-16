<?php include_once('nima_header.php') ?>
<?php include_once('./db_conf/connection.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" href="./assets/fontawesome/free_font/css/all.min.css">
	<link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="./assets/bootstrap/js/bootstrap.min.js">
	<link rel="stylesheet" href="contact.css">
	<link rel="stylesheet" href="style.css">
	<link rel="shortcut icon" href="./assets/image/logo.png" type="image/x-icon">

</head>

<body onload="loader_function()">
	<div id="loader"></div>
	<section class="contact">
		<div class="content">
			<h3 class="mt-5">Contact Us</h3>
			<p>We're Here To Help Answer Any Question You Might Here. We Look Forward To Heading😊</p>
		</div>
		<div class="containerContact">
			<div class="contactInfo">
				<div class="box">
					<div class="icons"><i class="fa fa-map-marker"></i></div>
					<div class="text">
						<h3>Address</h3>
						<p>384151,S.J Road,Patan,Gujarat</p>
					</div>
				</div>
				<div class="box">
					<div class="icons"><i class="fa fa-phone"></i></div>
					<div class="text">
						<h3>Phone</h3>
						<p>332-769-1245</p>
					</div>
				</div>
				<div class="box">
					<div class="icons"><i class="fa fa-envelope"></i></div>
					<div class="text">
						<h3>Email</h3>
						<p>nima@yahoo.com</p>
					</div>
				</div>
			</div>
			<div class="contactFrom">
				<form method="POST" action="<?php $PHP_SELF ?>">
					<h2>Send Message</h2>
					<div class="inputBox">
						<input type="text" name="name" required="required" value="<?php echo (isset($_POST['name'])) ? $_POST['name'] : ""  ?>">
						<span>Full Name</span>
					</div>
					<div class="inputBox">
						<input type="email" name="email" required="required" value="<?php echo (isset($_POST['email'])) ? $_POST['email'] : ""  ?>">
						<span>Email</span>
					</div>
					<div class="inputBox">
						<textarea required="required" name="message"><?php echo (isset($_POST['message'])) ? $_POST['message'] : ""  ?></textarea>
						<span>Type your Message...</span>
					</div>
					<div class="inputBox">
						<input type="submit" name="submit" value="Send">
					</div>
				</form>
			</div>
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

<?php
if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];

	$insert_contact = "INSERT INTO tbl_contact(name, email, message) VALUES ('$name', '$email', '$message')";
	$query_contact = mysqli_query($connection, $insert_contact);
	if ($query_contact) {
?>
		<script>
			swal("Done!", "Your message received successfully.", "success");
		</script>
	<?php
	} else {
	?>
		<script>
			swal("Try again!", "There was some error while sending your message, Please try later", "error");
		</script>
<?php
	}
}

?>