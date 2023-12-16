<?php
session_start();
if ($_SESSION['is_admin_login'] != true) {
    header('location: admin_login.php');
}
include('./../db_conf/connection.php');
$id=$_GET['id'];
$p_img=$_GET['p_img'];
  if ($id != null) {
    unlink("./images/mobiles/" .$p_img);
    $delete="DELETE FROM tbl_mobiles WHERE id=$id";
    $delete_query=mysqli_query($connection,$delete);
  }
  header('location:mobile_list.php');
?>