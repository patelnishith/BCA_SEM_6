<?php session_start(); ?>
<?php include_once('nima_header.php');?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/fontawesome/free_font/css/all.min.css">
  <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/bootstrap/js/bootstrap.min.js">
  <link rel="stylesheet" href="style.css">
  <link rel="shortcut icon" href="./assets/image/logo.png" type="image/x-icon">

</head>

<body onload="loader_function()">
  <div id="loader"></div>
  <!-- image slider start------------------------------------------------>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-caption">
        <div class="main-header-btn">
          <div>
            <h1>Wel-Come to <span>Nima Tech</span></h1>
          </div>
          <div>
            <p>we are selling top technology like <span>smart-phone, laptop, music accessories.</span></p>
          </div>
          <?php
          if (empty($_SESSION['is_user_login'])) {
          ?>
            <div>
              <a href="login.php" title="login" class="btn-login">Login here</a>
              <a href="registration.php" title="registration" class="btn-registration">Registration</a>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
      <div class="carousel-item active first-image-slider">
        <img src="./assets/image/first-image-slider/img1.jpeg" alt="Thanos" class="img-fluid">
      </div>
      <div class="carousel-item first-image-slider">
        <img src="./assets/image/first-image-slider/img2.jpeg" alt="The Lion King" class="img-fluid">
      </div>
      <div class="carousel-item first-image-slider">
        <img src="./assets/image/first-image-slider/img3.jpeg" alt="Thanos" class="img-fluid">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!-- image slider end-------------------------------------------------->
  <!-- our top product start--------------------------------------------->

  <div class="sale-section-product">
    <div class="container flex-column sale-section">
      <div class="width-100">
        <h2 class="text-center text-capitalize text-dark font-weight-600 pt-5">our product</h2>
        <p class="text-center text-capitalize text-dark font-weight-600">we are focusing on below product.</p>
      </div>
      <div class="row" style="display: flex; justify-content: center;">
        <div class=" col-xl-4 col-lg-4 col-md-6 col-sm-8 col-10 p-0">
          <div class="box sale-section-card px-3">
            <div class="product-face product-face1">
              <div class="content" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
                <img src="./assets/image/card-iphone.png" style="width: 60px; height:100px;">
                <h3>Smartphone</h3>
              </div>
            </div>
            <div class="product-face product-face2">
              <div class="content">
                <p>
                  Smart phone is like portable mini world and acts like your best friend until you use it wisely.
                </p>
                <a href="mobiles_ui.php">Read more</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-8 col-10 p-0">
          <div class="box sale-section-card px-3">
            <div class="product-face product-face1">
              <div class="content">
                <img src="./assets/image/card-laptop.png" style="width: 100px; height: 70px;">
                <h3>Laptop</h3>
              </div>
            </div>
            <div class="product-face product-face2">
              <div class="content">
                <p>
                  Laptops are like younger brothers of smartphones, more smarter more better, more reliable.
                </p>
                <a href="laptops_ui.php">Read more</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-8 col-10 p-0">
          <div class="box sale-section-card px-3">
            <div class="product-face product-face1">
              <div class="content">
                <img src="./assets/image/card-headphone.png" style="width: 100px; height: 100px;">
                <h3>Accessories</h3>
              </div>
            </div>
            <div class="product-face product-face2">
              <div class="content">
                <p>
                  Smart devices are half useless without their accessories. use them or get useto hardwork.
                </p>
                <a href="#">Read more</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- our top product end----------------------------------------------->

  <!--second  image slider start ---------------------------------------->

  <div class="optional-image-slider">
    <div id="optional-slider">
      <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel" data-interval="2000">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators1" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active second-image-slider">
            <img src="./assets/image/second-image-slider/secondimg1.jpeg" alt="usb cable" class="img-fluid">
            <div class="carousel-caption">
              <h1>USB Cable</h1>
              <p>USB's are smarter way to transfer Files, Images, and Videos etc.</p>
              <a href="#" class="charger-adapter-pen-btn">read more</a>
            </div>
          </div>
          <div class="carousel-item second-image-slider">
            <img src="./assets/image/second-image-slider/secondimg2.jpeg" alt="power bank" class="img-fluid">
            <div class="carousel-caption">
              <h1>Power Bank</h1>
              <p>Power Banks are portable chargers Designed to recharge your Smart-Phone.</p>
              <a href="#" class="charger-adapter-pen-btn">read more</a>
            </div>
          </div>
          <div class="carousel-item second-image-slider">
            <img src="./assets/image/second-image-slider/secondimg3.jpeg" alt="mobile charger" class="img-fluid">
            <div class="carousel-caption">
              <h1>Mobile Charger</h1>
              <p>A Charger is a circuit device used for charging your mobile batteries.</p>
              <a href="#" class="charger-adapter-pen-btn">read more</a>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>

  <!-- second image slider end ------------------------------------------>

  <!-- owner card start------------------------------------------------>

  <section class="owner-information">
    <div class="container">
      <h2 class="font-weight-bold text-uppercase text-center">Owner</h2>
      <div class="row">
        <div class="col-xl-5 col-lg-5 col-md-8 col-sm-10 col-10" style="margin: 50px 10px;">
          <div class="box">
            <a href="#"><img src="./assets/image/owner1.jpg" class="img-fluid"></a>
            <h2 class=" text-center text-uppercase pt-5">Mahediali</h2>
            <p class="m-4 text-justify">Momin Mahediali is a student studying in third year of <span style="font-weight: bold; text-transform: capitalize; color: #000;">bachelor of computer application.</span> He is brilliant in front-end programming and he play's a roll as a <span style="font-weight: bold; text-transform: capitalize; color: #000;">UI/UX</span></p>
            <div class="owner-socialIcon">
              <a href="" title="twitter"><i class="fab fa-twitter" style="color: #fff"></i></a>
              <a href="" title="facebook"><i class="fab fa-facebook-f" style="color: #fff"></i></a>
              <a href="" title="instagram"><i class="fab fa-instagram" style="color: #fff"></i></a>
              <a href="" title="linkedin"><i class="fab fa-linkedin-in" style="color: #fff"></i></a>
            </div>
          </div>
        </div>
        <div class="col-xl-5 col-lg-5 col-md-8 col-sm-10 col-10" style="margin: 50px 10px;">
          <div class="box">
            <a href="#"><img src="./assets/image/owner2.jpg" class="img-fluid"></a>
            <h2 class="text-uppercase text-center pt-5">Nishith</h2>
            <p class="m-4 text-justify">Patel Nishith is a student studying in third year of <span style="font-weight: bold; text-transform: capitalize; color: #000;">bachelor of computer application</span>. He is smart in back-end programming and he play's a roll as <span style="font-weight: bold; text-transform: capitalize; color: #000;">data adminstrator</span></p>
            <div class="owner-socialIcon">
              <a href="" title="twitter"><i class="fab fa-twitter" style="color: #fff"></i></a>
              <a href="#" title="facebook"><i class="fab fa-facebook-f" style="color: #fff"></i></a>
              <a href="https://www.instagram.com/_nishith_patel_/" title="instagram"><i class="fab fa-instagram" style="color: #fff"></i></a>
              <a href="https://www.linkedin.com/in/nishith-patel-37968319a/" title="linkedin"><i class="fab fa-linkedin-in" style="color: #fff"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- owner card end-------------------------------------------------->

  <!-- scroll button html start---------------------------------------->
  <div class="scrollbutton">
    <button onclick="topFunction()" id="myscrollbarBotton" title="Go to top"><i class="fas fa-angle-double-up"></i></button>
  </div>
  <!-- scroll button html end------------------------------------------->
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

<!-- scroll button script start --------------------------------->
<script>
  var mybutton = document.getElementById("myscrollbarBotton");

  window.onscroll = function() {
    scrollFunction()
  };

  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      mybutton.style.display = "block";
    } else {
      mybutton.style.display = "none";
    }
  }

  function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }
</script>
<!-- scroll button script end --------------------------------->

<?php include_once('nima_footer.php') ?>