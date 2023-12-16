<?php
include_once('./db_conf/connection.php');
include_once('nima_header.php');
$lap_id=$_GET['lap_id'];
$select = "SELECT * FROM tbl_laptops WHERE id=$lap_id";
$select_query = mysqli_query($connection, $select);

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
    <link rel="stylesheet" href="laptops.css">
</head>

<body>
    
        <?php
        while ($response = mysqli_fetch_array($select_query)) {
        ?>
        <div class="container mt-5 mx-auto">
            <div class="row p-4 bg-white mt-5 mb-3 mx-5">
                <div class="pb-2 col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12 mx-auto">
                    <div class="p-2 col-xl-10 col-lg-10 col-md-8 col-sm-12 col-12 mx-auto company-icon d-flex justify-content-between">
                        <img src="./assets/image/laptops_icon/<?php echo $response['company_name']?>.svg" class="img-fluid p-0 col-xl-1 col-lg-1 col-md-2 col-sm-2 col-2">
                        <div class="share-icon p-xl-3 p-lg-3 p-md-2 p-sm-1 p-1 d-flex align-items-center justify-content-center">
                            <i class="fa fa-share-alt"></i>
                        </div>
                    </div>
                    <div class="mx-auto col-xl-5 col-lg-5 col-md-6 col-sm-8 col-8">
                        <img src="./admin/images/laptops/<?php echo $response['product_img']; ?>" alt="<?php echo $response['model_name'] ?>" class="img-fluid">
                    </div>
                </div>
                <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12 mx-auto  p-0  border-top">
                    <div class="model-name  py-2  mt-2">
                        <label for="model_name" class="text-capitalize font-weight-bold">model name</label>
                        <h3 id="model_name"><?php echo $response['model_name'] ?></h3>
                    </div>
                    <div class="product-info  py-2  mt-2 border-top">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-10 col-10 pr-xl-1 pr-lg-1 pr-md-1  p-0">
                            <label for="product-info" class="text-capitalize font-weight-bold">product info</label>
                            <p id="product-info"><?php echo $response['description'] ?></p>
                        </div>

                    </div>
                    <div class="product-info  py-2  mt-2 border-top d-flex flex-lg-row flex-md-row flex-column">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-10 pr-xl-1 pr-lg-1 pr-md-1 p-0">
                            <label for="processor" class="text-capitalize font-weight-bold">processor</label>
                            <p id="processor"><?php echo $response['processor'] ?></p>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-10 pl-xl-3 pl-lg-3 pl-md-3 p-0 border-left-mode">
                            <label for="memory" class="text-capitalize font-weight-bold">memory storage</label>
                            <p id="memory"><?php echo $response['memory_storage'] ?></p>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-10 pl-xl-3 pl-lg-3 pl-md-3 p-0 border-left-mode">
                            <label for="graphics" class="text-capitalize font-weight-bold">graphics</label>
                            <p id="graphics"><?php echo $response['graphics'] ?></p>
                        </div>
                    </div>
                    <div class="product-info py-2  mt-2 border-top d-flex flex-lg-row flex-md-row flex-column">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-10 col-10 pr-xl-1 pr-lg-1 pr-md-1 p-0">
                            <label for="display" class="text-capitalize font-weight-bold">display</label>
                            <p id="display"><?php echo $response['display'] ?></p>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-10 col-10 pl-xl-3 pl-lg-3 pl-md-3 p-0 border-left-mode">
                            <label for="design_battery" class="text-capitalize font-weight-bold">design battery</label>
                            <p id="design_battery"><?php echo $response['design_battery'] ?></p>
                        </div>
                    </div>
                    <div class="product-info py-2  mt-2 border-top d-flex flex-lg-row flex-md-row flex-column">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-10 col-10 pr-xl-1 pr-lg-1 pr-md-1 p-0">
                            <label for="operating_system" class="text-capitalize font-weight-bold">operating system</label>
                            <p id="operating_system"><?php echo $response['operating_system'] ?></p>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-10 col-10 pl-xl-3 pl-lg-3 pl-md-3 p-0 border-left-mode">
                            <label for="ports_cd_drive" class="text-capitalize font-weight-bold">ports && CD drive</label>
                            <p id="ports_cd_drive"><?php echo $response['ports_cd_drive'] ?></p>
                        </div>
                    </div>
                    <div class="product-info  py-2  mt-2 border-top d-flex flex-lg-row flex-md-row flex-column">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-10 pr-xl-1 pr-lg-1 pr-md-1 p-0">
                            <label for="keyboard" class="text-capitalize font-weight-bold">keyboard</label>
                            <p id="keyboard"><?php echo $response['keyboard'] ?></p>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-10 pl-xl-3 pl-lg-3 pl-md-3 p-0 border-left-mode">
                            <label for="audio" class="text-capitalize font-weight-bold">audio</label>
                            <p id="audio"><?php echo $response['audio'] ?></p>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-10 pl-xl-3 pl-lg-3 pl-md-3 p-0 border-left-mode">
                            <label for="camera" class="text-capitalize font-weight-bold">camera</label>
                            <p id="camera"><?php echo $response['camera'] ?></p>
                        </div>
                    </div>
                    <div class="product-info  py-2  mt-2 border-top d-flex flex-lg-row flex-md-row flex-column">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-10 col-10 pr-xl-1 pr-lg-1 pr-md-1  p-0">
                            <label for="cooling" class="text-capitalize font-weight-bold">cooling</label>
                            <p id="cooling"><?php echo $response['cooling'] ?></p>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-10 col-10 pl-xl-3 pl-lg-3 pl-md-3 p-0 border-left-mode">
                            <label for="inside_the_box" class="text-capitalize font-weight-bold">inside the box</label>
                            <p id="inside_the_box"><?php echo $response['inside_the_box'] ?></p>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-10 col-10 pl-xl-3 pl-lg-3 pl-md-3 p-0 border-left-mode">
                            <label for="weight" class="text-capitalize font-weight-bold">weight</label>
                            <p id="weight"><?php echo $response['weight'] ?></p>
                        </div>
                    </div>
                    <div class="product-info  py-2  mt-2 border-top d-flex flex-lg-row flex-md-row flex-column">
                        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 pr-xl-1 pr-lg-1 pr-md-1  p-0">
                            <label for="warranty" class="text-capitalize font-weight-bold">warranty</label>
                            <p id="warranty"><?php echo $response['warranty'] ?></p>
                        </div>
                        
                    </div>
                    <div class="product-info  py-2  mt-2 border-top d-flex justify-content-between">
                        <div class="add_buy">
                        <a href="add_to_cart.php?p_id=<?php echo $response['id'];?>&type=mobile" class="btn btn-primary text-capitalize add-to-cart mt-2"><i class="fas fa-shopping-cart pr-1"></i>add to cart</a>
                        <a href="order_items.php?p_id=<?php echo $response['id'];?>&type=laptop" class="btn btn-primary text-capitalize  buy-now  mt-2"><i class="fas fa-shopping-cart pr-1"></i>buy now</a>
                        </div>
                        <div class="mt-sm-2 mt-2">
                            <div class="d-flex flex-row">
                                <p class="text-capitalize">price:</p>
                                <p id="price" class="pl-2 text-danger">
                                    <i class="fas fa-rupee-sign px-1"></i>
                                    <?php echo $response['price'] ?>
                                </p>
                            </div>
                            <div class="d-flex flex-row">
                                <p class="text-capitalize">you save:</p>
                                <p class="text-danger"><?php
                                                        $price = $response['price'];
                                                        $discount = $response['discount'];
                                                        $save = ($price * $discount) / 100;
                                                        ?><i class="fas fa-rupee-sign px-1"></i>
                                    <?php echo $save; ?>
                                </p>
                                <p class="pl-1 text-danger">[<?php echo $response['discount']; ?>%]</p>
                            </div>
                            <div class="d-flex flex-row">
                                <p class="text-capitalize">pay only:</p>
                                <p class="font-weight-bold border-bottom border-top px-2 text-danger">
                                    <?php $pay_only = $price - $save;
                                    ?><i class="fas fa-rupee-sign px-1"></i>
                                    <?php echo $pay_only ?>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </div>
    </div>
<?php
        }
?>
</body>

</html>
<?php include_once('nima_footer.php'); ?>