<?php
  session_start();
  if ($_SESSION['is_admin_login'] != true) {
	header('location: admin_login.php');
  }
?>

<?php include_once('admin_header.php') ?>
<?php include_once('admin_aside.php') ?>
<?php include_once('../db_conf/connection.php') ?>

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
    <link rel="stylesheet" href="admin_super_user.css">
	<link rel="shortcut icon" href="./assets/image/logo.png" type="image/x-icon">

    <script>
        let element = document.getElementsByClassName('active');
        if (element != null) {
            document.getElementById(element[0].id).classList.remove("active");
            document.getElementById('superusers').classList.add("active");
        }
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
    <div class="w-100">
        <form class="w-50 " autocomplete="off" method="POST">
            <h2 class="text-capitalize mb-1"><i class="fas fa-user pr-2"></i>super admin registration</h2>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group p-1">
                        <label for="first_name">first name:</label>
                        <input type="text" class="form-control w-100 mt-1 p-2" id="first_name" placeholder="First Name..." name="first_name" value="<?php echo (isset($_POST['first_name'])) ? $_POST['first_name'] : ""  ?>">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group p-1">
                        <label for="last_name">last name:</label>
                        <input type="text" class="form-control w-100 mt-1 p-2" id="last_name" placeholder="Last Name..." name="last_name" value="<?php echo (isset($_POST['last_name'])) ? $_POST['last_name'] : ""  ?>">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group p-1">
                        <label for="email">email:</label>
                        <input type="email" class="form-control w-100 mt-1 p-2" id="email" placeholder="Email..." name="email" value="<?php echo (isset($_POST['email'])) ? $_POST['email'] : ""  ?>">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group p-1">
                        <label for="phone_no">phone no:</label>
                        <input type="text" class="form-control w-100 mt-1 p-2" id="phone_no" placeholder="Phone No..." name="phone_no" value="<?php echo (isset($_POST['phone_no'])) ? $_POST['phone_no'] : ""  ?>">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group p-1">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control w-100 mt-1 p-2" id="password" placeholder="Password..." name="password">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group p-1">
                        <label for="confirm_password">confirm Password:</label>
                        <input type="password" class="form-control w-100 mt-1 p-2" id="confirm_password" placeholder="Confirm Password..." name="confirm_password">
                    </div>
                </div>
            </div>
            <div class="form-group p-1 d-flex  flex-column">
                <label for="gender">Gender:</label>
                <select class="form-control w-100 py-2 mt-1" id="gender" name="gender">
                    <option value="0">Male</option>
                    <option value="1">Female</option>
                </select>
            </div>

            <div class="admin-btn w-100 p-1 mt-3">
                <button type="submit" class="form-control btn btn-primary py-2" name="submit">Save</button>
            </div>
        </form>
    </div>

</body>

</html>
<?php

// password and confirm password function start
function isPasswordAndConfirmPasswordMatch($password, $confirm_password)
{
    if ($password === $confirm_password) {
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

if (isset($_POST['submit'])) {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $phone_no = $_POST['phone_no'];
    $gender = $_POST['gender'];

    // email already exist function call start
    $is_email_exist = isEmailAlreadyExist($connection, $email);
    if ($is_email_exist != true) {
?>
        <script>
            alert("Your giver email id already exist. Please enter another email id!");
        </script>
    <?php
        return false;
    }
    // email already exist function call end

    // password and confirm password function call start
    $encrypted_pass = password_hash($password, PASSWORD_BCRYPT);
    $is_password_valid = isPasswordAndConfirmPasswordMatch($password, $confirm_password);
    if ($is_password_valid != true) {
    ?>
        <script>
            alert("Password and Confirm Password does not match.");
        </script>
    <?php
        return false;
    }
    if (strlen($password) <= 4 && strlen($confirm_password) <= 4) {
    ?>
        <script>
            alert("Please enter more than 4 character on password.");
        </script>
    <?php
        return false;
    }
    // password and confirm password function call end

    $insert = "INSERT INTO tbl_user_registration(first_name, last_name, email, password, phone_no, gender,is_super_admin) VALUES ('$first_name', '$last_name', '$email', '$encrypted_pass',$phone_no, $gender,'1')";
    $insert_query = mysqli_query($connection, $insert);
    if ($insert_query) {
    ?>
        <script>
            alert("super admin successfully added");
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("There was some error while registring your data, Please try later");
        </script>
<?php
    }
}
?>