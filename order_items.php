<?php session_start(); ?>
<?php include_once('nima_header.php') ?>
<?php include_once('./db_conf/connection.php');
  if($_SESSION['user_id']!=null){
    $p_id=$_GET['p_id'];
  $type=$_GET['type'];
  $user_id=$_SESSION['user_id'];
  if(isset($_POST['submit'])){
	  $full_name=$_POST['full_name'];
	  $phone_no=$_POST['phone_no'];
	  $pin=$_POST['pincode_no'];
	  $address=$_POST['address'];
	  $quantity=$_POST['quantity'];
	  $insert="INSERT INTO tbl_orders(p_id, user_id, type, full_name, mobile_no, address,quantity) VALUES ($p_id, $user_id, '$type', '$full_name', '$phone_no', '$address',$quantity)";
	  $check_ins=mysqli_query($connection,$insert);
	  if($check_ins){
		  ?>
		   <script>
		     alert("order confirmed");
			 window.location.href='user_orders.php';
		   </script>
		  <?php
	  }else{
		?>
		
		<script>
		  alert("some errors are occur please try later");
		</script>
	   <?php
	  }
  }
  }
  else{
	  ?>
	  <script>

		  alert("you need to login for buy any product");
		  window.location.href='login.php';
	  </script>
	  <?php
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
	<link rel="stylesheet" href="order_items.css">
	<link rel="stylesheet" href="style.css">
	<link rel="shortcut icon" href="./assets/image/logo.png" type="image/x-icon">

</head>
<body onload="loader_function()">
	<div id="loader"></div>
	<div class="w-100 registration-form pt-5 d-flex justify-content-center align-items-center flex-column ">
		<form class="w-50 mb-5" autocomplete="off" method="POST">
			<h2 class="text-capitalize mb-1 text-center"><i class="fas fa-users pr-2"></i>Order Now</h2>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 p-0">
					<div class="form-group d-flex flex-column p-1">
						<label for="first_name" class="m-0">Full Name</label>
						<input type="text" class="form-control w-100 mt-1 p-2" name="full_name" placeholder="full name..." id="first_name" required autocomplete="off" value="<?php echo (isset($_POST['pincode_no'])) ? $_POST['full-name'] : ""  ?>">
					</div>
				</div>	
				<div class="col-lg-12 col-md-12 col-sm-12 p-0">
					<div class="form-group d-flex flex-column p-1">
						<label class="m-0" for="phone_no">Phone No</label>
						<input type="text" class="form-control w-100 mt-1 p-2" name="phone_no" placeholder="phone no..." id="phone_no" required  autocomplete="off" value="<?php echo (isset($_POST['phone_no'])) ? $_POST['phone_no'] : ""  ?>">
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 p-0">
					<div class="form-group d-flex  flex-column p-1">
						<label class="m-0" for="pincode_no">Pin No</label>
						<input type="text" class="form-control w-100 mt-1 p-2" name="pincode_no" placeholder="pincode..." id="pincode_no" required autocomplete="off" value="<?php echo (isset($_POST['pincode_no'])) ? $_POST['pincode_no'] : ""  ?>">
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 p-0">
					<div class="form-group d-flex flex-column p-1">
						<label for="quantity">Quantity</label>
						<select name="quantity" id="quantity" class="form-control" required autocomplete="off">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
						
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 p-0">
					<div class="form-group d-flex flex-column p-1">
						<label class="m-0" for="address">Address</label>
						<textarea class="form-control mt-1 p-2 w-100" name="address" rows="3" placeholder="flat,house no,building,company,apartment,city..." id="address" required autocomplete="off"><?php echo (isset($_POST['address'])) ? $_POST['address'] : ""  ?></textarea>
					</div>
				</div>
				
				<div class="col-lg-12 col-md-12 col-sm-12 p-0">
					<div class="form-group d-flex flex-row p-1">
					    <input type="checkbox" class="mt-1 mr-2" id="check" required>
						<label for="check">I Agree terms and conditions</label>
					</div>
				</div>
				<div class="w-100 mt-1">
					<button type="submit" class="btn btn-primary py-2" name="submit">Order Now</button>
				</div>
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