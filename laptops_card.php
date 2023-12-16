<?php
include_once('./db_conf/connection.php');
include_once('nima_header.php');
if ($_GET['company_name'] == null) {
    header('location:laptops_ui.php');
}
$company_name = $_GET['company_name'];
$select = "SELECT * FROM tbl_laptops WHERE company_name = $company_name";
$select_query = mysqli_query($connection, $select);
$count_product = mysqli_num_rows($select_query);

?>
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
    <link rel="stylesheet" href="laptops_card.css">
</head>

<body>
    <div class="container margin-mode mx-auto">

        <div class="row d-flex flex-column flex-sm-column flex-md-row flex-lg-row flex-xl-row">
            <?php
            if ($count_product > 0)
            {
                while ($response = mysqli_fetch_array($select_query))
                 {
            ?>
                <div class="d-flex col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 my-2 mx-auto p-0">
                    <div class="card product_card">
                        <a href="laptops.php?lap_id=<?php echo $response['id']; ?>" class="mx-auto">
                            <img class="card-img-top img-fluid mx-auto p-2" src="./admin/images/laptops/<?php echo $response['product_img']; ?>" alt="<?php echo $response['model_name']; ?>">
                        </a>
                        <div class="card-body product_card_title  d-flex justify-content-center flex-column align-items-lg-center py-1">
                            <div class="w-100 model_name d-flex  flex-row">
                                <span class="">name:</span>
                                <h1 class="card-title mt-1 p-0 mb-1"><?php echo $response['model_name']; ?></h1>
                            </div>
                            <div class="d-flex justify-content-start  w-100">
                                <p class="card-text mb-1"><i class="fas fa-rupee-sign px-1"></i><?php echo $response['price'] ?></p>
                            </div>
                            <div class="w-100 d-flex justify-content-xl-between justify-content-lg-between justify-content-md-center  mb-3 add_buy_btn">
                                <a href="add_to_cart.php?p_id=<?php echo $response['id'];?>&type=laptop" class="btn btn-primary text-capitalize  style_btn"><i class="fas fa-shopping-cart pr-1"></i>add to cart</a>
                                <a href="order_items.php?p_id=<?php echo $response['id'];?>&type=laptop" class="btn btn-primary text-capitalize style_btn"><i class="fas fa-shopping-cart pr-1"></i>buy now</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                }
            }
            else {
            ?>
                <div class="empty_state">
                    <img src="./assets/image/empty-animation-staff.gif" alt="" width="200px">
                    <h1>oops! no product</h1>
                </div>
            <?php
            }
            ?>
        </div>

    </div>
</body>

</html>
<?php include_once('nima_footer.php'); ?>