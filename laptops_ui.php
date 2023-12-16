<?php include_once('nima_header.php'); ?>

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
    <style>
        body {
            background-color: #efefef !important;
        }

        .laptop .container {
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
            height: 100vh !important;
            width: 100% !important;
        }

        .laptop .container img {
            transition: 0.3s !important;
            transition-timing-function: linear !important;
        }

        .laptop .container img:hover {
            transform: scale(1.1) !important;
        }

        @media(max-width:768px) {
            .laptop .container {
                height: 100% !important;
            }
        }
    </style>
</head>

<body>
    <div class="laptop">
        <div class="container">
            <div class="row m-5">
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 d-flex justify-content-center align-items-center py-5">
                    <a href="laptops_card.php?company_name='acer'" title="acer">
                        <img src="./assets/image/laptops_icon/acer.svg" class="img-fluid" width="100px" alt="acer">
                    </a>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 d-flex justify-content-center align-items-center py-5">
                    <a href="laptops_card.php?company_name='apple'" title="apple">
                        <img src="./assets/image/laptops_icon/apple.svg" class="img-fluid" width="100px" alt="apple">
                    </a>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-6 d-flex justify-content-center align-items-center py-5">
                    <a href="laptops_card.php?company_name='asus'" title="asus">
                        <img src="./assets/image/laptops_icon/asus.svg" class="img-fluid" width="100px" alt="asus">
                    </a>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 d-flex justify-content-center align-items-center py-5">
                    <a href="laptops_card.php?company_name='dell'" title="dell">
                        <img src="./assets/image/laptops_icon/dell.svg" class="img-fluid" width="60px" alt="dell">
                    </a>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 d-flex justify-content-center align-items-center py-5">
                    <a href="laptops_card.php?company_name='hp'" title="hp">
                        <img src="./assets/image/laptops_icon/hp.svg" class="img-fluid" width="60px" alt="hp">
                    </a>
                </div>

                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 d-flex justify-content-center align-items-center py-5">
                    <a href="laptops_card.php?company_name='lenovo'" title="lenovo">
                        <img src="./assets/image/laptops_icon/lenovo.svg" class="img-fluid" width="100px" alt="lenovo">
                    </a>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 d-flex justify-content-center align-items-center py-5">
                    <a href="laptops_card.php?company_name='lg'" title="lg">
                        <img src="./assets/image/laptops_icon/lg.svg" class="img-fluid" width="60px" alt="lg">
                    </a>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 d-flex justify-content-center align-items-center py-5">
                    <a href="laptops_card.php=?company_name='msi'" title="msi">
                        <img src="./assets/image/laptops_icon/msi.svg" class="img-fluid" width="60px" alt="msi">
                    </a>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 d-flex justify-content-center align-items-center py-5">
                    <a href="laptops_card.php=?company_name='samsung'" title="samsung">
                        <img src="./assets/image/laptops_icon/samsung.svg" class="img-fluid" width="110px" alt="samsung">
                    </a>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 d-flex justify-content-center align-items-center py-5">
                    <a href="laptops_card.php?company_name='sony'" title="sony">
                        <img src="./assets/image/laptops_icon/sony.svg" class="img-fluid" width="100px" alt="sony">
                    </a>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 d-flex justify-content-center align-items-center py-5">
                    <a href="laptops_card.php?company_name='toshiba'" title="toshiba">
                        <img src="./assets/image/laptops_icon/toshiba.svg" class="img-fluid" width="100px" alt="toshiba">
                    </a>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 d-flex justify-content-center align-items-center py-5">
                    <a href="laptops_card.php?company_name='xiomi'" title="xiaomi">
                        <img src="./assets/image/laptops_icon/xiaomi.svg" class="img-fluid" width="50px" alt="xiaomi">
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php include_once('nima_footer.php'); ?>