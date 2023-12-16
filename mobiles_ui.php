<?php include_once('nima_header.php') ?>
<!DOCTYPE html>
<html>

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
        .mobile-ui .container {
            height: 100vh !important;
            width: 100% !important;
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
        }
        .mobile-ui img {
            transition: 0.3s !important;
            transition-timing-function: linear !important;
        }

        .mobile-ui img:hover {
            transform: scale(1.1) !important;

        }
        @media(max-width:768px) {
            .mobile-ui .container {
                height: 100% !important;
            }
        }
    </style>
</head>
<body>
    <div class="mobile-ui">
        <div class="container">
            <div class="row m-5">
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 d-flex justify-content-center align-items-center py-5">
                    <a href="mobiles_card.php?company_name='apple'" title="apple">
                        <img src="./assets/image/mobiles_icon/apple.svg" class="img-fluid" width="60px" alt="apple">
                    </a>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 d-flex justify-content-center align-items-center py-5">
                    <a href="mobiles_card.php?company_name='asus'" title="asus">
                        <img src="./assets/image/mobiles_icon/asus.svg" class="img-fluid" width="80px" alt="asus">
                    </a>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-6 d-flex justify-content-center align-items-center py-5">
                    <a href="mobiles_card.php?company_name='huawei'" title="huawei">
                        <img src="./assets/image/mobiles_icon/huawei.svg" class="img-fluid" width="60px" alt="huawei">
                    </a>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 d-flex justify-content-center align-items-center py-5">
                    <a href="mobiles_card.php?company_name='motorola'" title="motorola">
                        <img src="./assets/image/mobiles_icon/motorola.svg" class="img-fluid" width="120px" alt="motorola">
                    </a>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 d-flex justify-content-center align-items-center py-5">
                    <a href="mobiles_card.php?company_name='nokia'" title="nokia">
                        <img src="./assets/image/mobiles_icon/nokia.svg" class="img-fluid" width="100px" alt="nokia">
                    </a>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 d-flex justify-content-center align-items-center py-5">
                    <a href="mobiles_card.php?company_name='oneplus'" title="oneplus">
                        <img src="./assets/image/mobiles_icon/oneplus.svg" class="img-fluid" width="60px" alt="oneplus">
                    </a>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 d-flex justify-content-center align-items-center py-5">
                    <a href="mobiles_card.php?company_name='oppo'" title="oppo">
                        <img src="./assets/image/mobiles_icon/oppo.svg" class="img-fluid" width="110px" alt="oppo">
                    </a>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 d-flex justify-content-center align-items-center py-5">
                    <a href="mobiles_card.php?company_name='samsung'" title="samsung">
                        <img src="./assets/image/mobiles_icon/samsung.svg" class="img-fluid" width="110px" alt="samsung">
                    </a>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 d-flex justify-content-center align-items-center py-5">
                    <a href="mobiles_card.php?company_name='sony'" title="sony">
                        <img src="./assets/image/mobiles_icon/sony.svg" class="img-fluid" width="110px" alt="sony">
                    </a>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 d-flex justify-content-center align-items-center py-5">
                    <a href="mobiles_card.php?company_name='vivo'" title="vivo">
                        <img src="./assets/image/mobiles_icon/vivo.svg" class="img-fluid" width="60px" alt="vivo">
                    </a>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 d-flex justify-content-center align-items-center py-5">
                    <a href="mobiles_card.php?company_name='xiaomi'" title="xiaomi">
                        <img src="./assets/image/mobiles_icon/xiaomi.svg" class="img-fluid" width="60px" alt="xiaomi">
                    </a>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 d-flex justify-content-center align-items-center py-5">
                    <a href="mobiles_card.php?company_name='google'" title="pixel">
                        <img src="./assets/image/mobiles_icon/google.svg" class="img-fluid" width="90px" alt="pixel">
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<?php include_once('nima_footer.php') ?>