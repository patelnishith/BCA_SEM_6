<?php session_start(); ?>
<?php include_once('../db_conf/connection.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/fontawesome/free_font/css/all.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/js/bootstrap.min.js">
    <link rel="stylesheet" href="admin_login.css">
	<link rel="shortcut icon" href="./assets/image/logo.png" type="image/x-icon">

</head>

<body>
    <div class="center-div ">
        <form method="POST" class="w-25 bg-white p-5">
            <div class="title_here">
                <h2 class="text-capitalize "><i class="fas fa-user" ></i>login here</h2>
            </div>
            <div class="form-group">
                <label for="email" class="text-capitalize">email</label>
                <input type="email" name="email" id="email" class="form-control pl-1" placeholder="email..." value="<?php echo (isset($_POST['email'])) ? $_POST['email'] : ""  ?>">
            </div>
            <div class="form-group">
                <label for="password" class="text-capitalize">password</label>
                <input type="password" name="password" id="password" class="form-control pl-1" placeholder="password..." value="<?php echo (isset($_POST['password'])) ? $_POST['password'] : ""  ?>">
            </div>
            <button type="submit" class="btn btn-primary  mt-3 w-100" name="submit">submit</button>
        </form>
    </div>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $select = "SELECT * FROM tbl_user_registration WHERE email='$email' AND is_super_admin=1 ";
    $query = mysqli_query($connection, $select);
    if (mysqli_num_rows($query)>0) {
        while ($response = mysqli_fetch_array($query)) { 
            if (password_verify($password, $response['password'])) {
                $_SESSION['admin_id']=$response['id'];
                $_SESSION['is_admin_login']=true;
                header('location:admin_index.php');
            } else {
            ?>
              <script>
                  alert("Your password is not match with given Email");
              </script>
            <?php
            }
        }
    }
    else{
        ?>
              <script>
                  alert("Your email is not exist in our system");
              </script>
            <?php
    }
  
}
?>