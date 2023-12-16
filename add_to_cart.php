<?php session_start(); ?>
<?php include_once('./db_conf/connection.php') ?>
<?php
if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
   $p_id = $_GET['p_id'];
   $type = $_GET['type'];
   $is_already_exist = "SELECT * FROM tbl_user_cart WHERE p_id=$p_id AND user_id=$user_id AND type='$type'";
   $check_product_already_exist = mysqli_query($connection, $is_already_exist);
   $count = mysqli_num_rows($check_product_already_exist); 
   if ($count <= 0) {
      $ins = "INSERT INTO tbl_user_cart(p_id, user_id, type) VALUES ($p_id, $user_id, '$type')";
      $check = mysqli_query($connection, $ins);
      if ($check) {
    ?>
         <script>
            if(confirm("succefully add to cart")){
            window.location.href = 'view_cart.php';
            }
         </script>
         
      } else {
         ?>
         <script>
            alert("some error are occur please try later");
         </script>
   <?php
      }
   }else{
      ?>
       <script>
          alert("product already exist");
          window.location.href = 'index.php';
       </script>
      <?php
   }
} else {
   ?>
   <script>
      alert("you need to login for add to cart product");
    window.location.href='login.php'
   </script>
<?php
}
?>