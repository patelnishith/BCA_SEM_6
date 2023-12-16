<?php include_once('nima_header.php') ?>
<?php include_once('./db_conf/connection.php') ?>
<?php

// password and confirm password function start
function isPasswordAndConfirmPasswordMatch($password, $c_password)
{
	if ($password === $c_password) {
		return true;
	}
	return false;
}
// password and confirm password function end

// email already exist function start
function isEmailAlreadyExist($connection, $email)
{
	$check_email_query = "select * from tbl_user_registration where email='$email'";

	$email_result = mysqli_query($connection, $check_email_query);

	if (mysqli_num_rows($email_result) > 0) {
		return false;
	}
	return true;
}
// email already exist function end
//validation start
function val($pass_arg)
{
	$pass_arg = trim($pass_arg);
	$pass_arg = htmlspecialchars($pass_arg);
	$pass_arg = stripslashes($pass_arg);
	return $pass_arg;
}

//validation end
if (isset($_POST['submit'])) {
$first_name = mysqli_real_escape_string($connection, val($_POST['first_name']));
$last_name = mysqli_real_escape_string($connection, val($_POST['last_name']));
$email = mysqli_real_escape_string($connection, val($_POST['email']));
$password = mysqli_real_escape_string($connection, val($_POST['password']));
$c_password 	= mysqli_real_escape_string($connection, val($_POST['confirm_password']));
$phone_no = mysqli_real_escape_string($connection, val($_POST['phone_no']));
$gender = mysqli_real_escape_string($connection, val($_POST['gender']));
$address = mysqli_real_escape_string($connection, val($_POST['address']));
$pincode_no = mysqli_real_escape_string($connection, val($_POST['pincode_no']));
	
	// email already exist function call start
	$is_email_exist = isEmailAlreadyExist($connection, $email);
	if ($is_email_exist != true) {
?>
		<script>
		  alert("Your giver email id already exist. Please enter another email id.");
		</script>
	<?php
		return false;
	}
	// email already exist function call end

	// password and confirm password function call start
	$encrypted_pass = password_hash($password, PASSWORD_BCRYPT);
	$is_password_valid = isPasswordAndConfirmPasswordMatch($password, $c_password);
	if ($is_password_valid != true) {
	?>
		<script>
			alert("Password and Confirm Password does not match.");
		</script>
	<?php
		return false;
	}
	if (strlen($password) <= 4 && strlen($c_password) <= 4) {
	?>
		<script>
               alert("Please enter more than 4 character on password.");
		</script>
	<?php
		return false;
	}
	// password and confirm password function call end

	$insert_user_regisration_data = "INSERT INTO tbl_user_registration(first_name, last_name, email, password, phone_no, gender, address, pincode_no) VALUES ('$first_name', '$last_name', '$email', '$encrypted_pass', $phone_no, $gender, '$address', $pincode_no)";
	$check_query = mysqli_query($connection, $insert_user_regisration_data);
	if ($check_query) {
	?>
		<script>
			alert("You are register successfully.");
		</script>
	<?php
	} else {
	?>
		<script>
			alert("There was some error while registring your data, Please try later")
		</script>
<?php
	}
}
?>
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
	<link rel="stylesheet" href="registration.css">
	<link rel="stylesheet" href="style.css">
	<link rel="shortcut icon" href="./assets/image/logo.png" type="image/x-icon">

</head>

<body onload="loader_function()">
	<div id="loader"></div>
	<div class="w-100 registration-form pt-5 d-flex justify-content-center align-items-center flex-column ">
		<form class="w-50 mb-5" autocomplete="off" method="POST">
			<h2 class="text-capitalize mb-1 text-center"><i class="fas fa-users pr-2"></i>Registration Here</h2>
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 p-0">
					<div class="form-group d-flex flex-column p-1">
						<label for="first_name" class="m-0">First Name</label>
						<input type="text" class="form-control w-100 mt-1 p-2" name="first_name" placeholder="first name..." id="first_name" value="<?php echo (isset($_POST['first_name'])) ? $_POST['first_name'] : ""  ?>">
						
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 p-0">
					<div class="form-group d-flex flex-column p-1">
						<label class="m-0" for="last_name">Last Name</label>
						<input type="text" class="form-control w-100 mt-1 p-2" name="last_name" placeholder="last name..." id="last_name" value="<?php echo (isset($_POST['last_name'])) ? $_POST['last_name'] : ""  ?>">
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 p-0">
					<div class="form-group d-flex flex-column p-1">
						<label class="m-0" for="email">Email</label>
						<input type="email" class="form-control w-100 mt-1 p-2" name="email" placeholder="email..." id="email" value="<?php echo (isset($_POST['email'])) ? $_POST['email'] : ""  ?>">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 p-0">
					<div class="form-group d-flex flex-column p-1">
						<label class="m-0" for="password">Password</label>
						<input type="password" class="form-control w-100 mt-1 p-2" name="password" placeholder="password..." id="password">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 p-0">
					<div class="form-group d-flex flex-column p-1">
						<label class="m-0" for="confirm_password">Confirm Password</label>
						<input type="password" class="form-control w-100 mt-1 p-2" name="confirm_password" placeholder="confirm password..." id="confirm_password">
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 p-0">
					<div class="form-group d-flex flex-column p-1">
						<label class="m-0" for="gender">Gender</label>
						<select name="gender" class="form-control w-100 mt-1" id="gender">
							<option value="0">Male</option>
							<option value="1">Female</option>
						</select>
					</div>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-8 p-0">
					<div class="form-group d-flex  flex-column p-1">
						<label class="m-0" for="pincode_no">Pin No</label>
						<input type="text" class="form-control w-100 mt-1 p-2" name="pincode_no" placeholder="pincode..." id="pincode_no" value="<?php echo (isset($_POST['pincode_no'])) ? $_POST['pincode_no'] : ""  ?>">
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 p-0">
					<div class="form-group d-flex flex-column p-1">
						<label class="m-0" for="phone_no">Phone No</label>
						<input type="text" class="form-control w-100 mt-1 p-2" name="phone_no" placeholder="phone no..." id="phone_no" value="<?php echo (isset($_POST['phone_no'])) ? $_POST['phone_no'] : ""  ?>">
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 p-0">
					<div class="form-group d-flex flex-column p-1">
						<label class="m-0" for="address">Address</label>
						<textarea class="form-control mt-1 p-2 w-100" name="address" rows="3" placeholder="address..." id="address"><?php echo (isset($_POST['address'])) ? $_POST['address'] : ""  ?></textarea>
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 p-0">
					<div class="form-group d-flex flex-row p-1">
						<input type="checkbox" class="mt-1 mr-2" id="check" required>
						<label for="check">I Agree terms and conditions</label>
					</div>
				</div>
				<div class="w-100 mt-1">
					<button type="submit" class="btn btn-primary py-2" name="submit">Register</button>
				</div>
		</form>
	</div>
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

