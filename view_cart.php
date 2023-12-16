<?php session_start(); ?>
<?php include_once('./db_conf/connection.php');
if (isset($_SESSION['user_id'])) {

$login_id=$_SESSION['user_id'];
$select_mob = "SELECT tbl_user_cart.id, tbl_mobiles.product_img,tbl_mobiles.product_name,tbl_mobiles.price FROM tbl_user_cart INNER JOIN tbl_mobiles ON tbl_user_cart.p_id=tbl_mobiles.id AND tbl_user_cart.user_id=$login_id and tbl_user_cart.type='mobile'"; 
$check_mob = mysqli_query($connection, $select_mob);
$select_lap="SELECT tbl_user_cart.id,tbl_laptops.product_img,tbl_laptops.model_name,tbl_laptops.price FROM tbl_user_cart INNER JOIN tbl_laptops ON tbl_laptops.id=tbl_user_cart.p_id AND tbl_user_cart.user_id=$login_id and tbl_user_cart.type='laptop'";
$check_lap=mysqli_query($connection,$select_lap);
}
?>

<?php include_once('nima_header.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/bootstrap/js/bootstrap.min.js">
    <link rel="stylesheet" href="./assets/fontawesome/free_font/css/all.min.css">
    <link rel="shortcut icon" href="./assets/image/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="view_cart.css">
</head>

<body>

    <div class="container-fluid my-5">
        <div class="row  p-5 mx-auto">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 p-2 changes">
                <h2>laptops<i class="fas fa-laptop pl-2"></i></h2>
                <?php while ($result = mysqli_fetch_array($check_lap)) {
                ?>
                  <div class="card d-flex flex-row border-0">
                    <div class="card-img pt-4 w-25">
                        <img src="./admin/images/laptops/<?php echo $result['product_img']?>" alt="<?php echo $response['model_name']?>" class="img-fluid img1">
                    </div>
                    <div class="card-body w-50">
                        <div class="d-flex flex-row">
                            <label>name:-</label>
                            <p class="mt-1 pl-1"><?php echo $result['model_name']?></p>
                        </div>
                        <div class="d-flex flex-row">
                            <label for="">price:-</label>
                            <p class="mt-1 pl-1"><?php echo $result['price']?></p>
                        </div>
                        
                    </div>
                    <div class="w-25 py-2 delete-btn  d-flex justify-content-center mt-3">
                        <a href="delete_laptop_cart.php?lap_cart_id=<?php echo $result['id']; ?>"><i class="fa fa-trash p-2 text-danger" title="delete"></i></a>
                    </div>
                </div>
                <?php
                } ?>
            </div>
            <div class="border_mode col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 p-2 changes">
                <h2>mobiles<i class="fas fa-mobile-alt pl-2"></i></h2>
                <?php
                while ($response = mysqli_fetch_array($check_mob)) {
                ?>
                    <div class="card d-flex flex-row border-0">
                        <div class="card-img pt-4 w-25">
                            <img src="./admin/images/mobiles/<?php echo $response['product_img'] ?>" alt="<?php echo $response['product_name'] ?>" class="img-fluid img2">
                        </div>
                        <div class="card-body w-50">
                            <div class="d-flex flex-row">
                                <label>name:-</label>
                                <p class="mt-1 pl-1"><?php echo $response['product_name']; ?></p>
                            </div>
                            <div class="d-flex flex-row">
                                <label for="">price:-</label>
                                <p class="mt-1 pl-1"><?php echo $response['price']; ?></p>
                            </div>
                        </div>
                        <div class="w-25 py-2 delete-btn  d-flex justify-content-center mt-3">
                            <a href="delete_mobile_cart.php?mob_cart_id=<?php echo $response['id']; ?>"><i class="fa fa-trash p-2 text-danger" title="delete"></i></a>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
</body>

</html>
<?php include_once('nima_footer.php'); ?>