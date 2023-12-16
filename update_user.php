<?php include_once('nima_header.php') ?>
<?php include_once('./db_conf/connection.php') ?>
<?php
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
$login_id = $_SESSION['user_id'];
$select = "SELECT * FROM tbl_user_registration WHERE id=$login_id";
$check_show = mysqli_query($connection, $select);
$array_data = mysqli_fetch_array($check_show);
if (isset($_POST['submit'])) {
    
    $login_id_update = $_SESSION['user_id'];

    $first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
    // $email = mysqli_real_escape_string($connection, $_POST['email']);
    // $password = mysqli_real_escape_string($connection, $_POST['password']);
    // $c_password = mysqli_real_escape_string($connection, $_POST['confirm_password']);
    $phone_no = mysqli_real_escape_string($connection, $_POST['phone_no']);
    $gender = mysqli_real_escape_string($connection, $_POST['gender']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    $pincode_no = mysqli_real_escape_string($connection, $_POST['pincode_no']);

    $update = "UPDATE tbl_user_registration SET first_name='$first_name', last_name='$last_name', phone_no=$phone_no, gender=$gender, address='$address', pincode_no=$pincode_no WHERE id=$login_id_update";
    $check_query = mysqli_query($connection, $update);
    if ($check_query) {
    ?>
        <script>
            alert("update done");
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("update not done");
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
                        <input type="text" class="form-control w-100 mt-1 p-2" name="first_name" placeholder="first name..." id="first_name" value="<?php echo $array_data['first_name'] ?>">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                    <div class="form-group d-flex flex-column p-1">
                        <label class="m-0" for="last_name">Last Name</label>
                        <input type="text" class="form-control w-100 mt-1 p-2" name="last_name" placeholder="last name..." id="last_name" value="<?php echo $array_data['last_name'] ?>">
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 p-0">
                    <div class="form-group d-flex flex-column p-1">
                        <label class="m-0" for="email">Email</label>
                        <input type="email" class="form-control w-100 mt-1 p-2" name="email" placeholder="email..." id="email" value="<?php echo $array_data['email'] ?>" disabled>
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
                        <input type="text" class="form-control w-100 mt-1 p-2" name="pincode_no" placeholder="pincode..." id="pincode_no" value="<?php echo $array_data['pincode_no'] ?>">
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 p-0">
                    <div class="form-group d-flex flex-column p-1">
                        <label class="m-0" for="phone_no">Phone No</label>
                        <input type="text" class="form-control w-100 mt-1 p-2" name="phone_no" placeholder="phone no..." id="phone_no" value="<?php echo $array_data['phone_no'] ?>">
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 p-0">
                    <div class="form-group d-flex flex-column p-1">
                        <label class="m-0" for="address">Address</label>
                        <input class="form-control mt-1 p-2 w-100" name="address" rows="3" placeholder="address..." id="address" value="<?php echo $array_data['address'] ?>"></input>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 p-0">
                    <div class="form-group d-flex flex-row p-1">
                        <input type="checkbox" class="mt-1 mr-2" id="check" required>
                        <label for="check">I Agree terms and conditions</label>
                    </div>
                </div>
                <div class="w-100 mt-1">
                    <button type="submit" class="btn btn-primary py-2" name="submit">Update</button>
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