<?php
session_start();
if ($_SESSION['is_admin_login'] != true) {
    header('location: admin_login.php');
}

include('./../db_conf/connection.php');
$id=$_GET['id'];
  if ($id != null) {
    $delete="DELETE FROM tbl_orders WHERE id=$id";
    $delete_query=mysqli_query($connection,$delete);
  }
  header('location:mobiles_order.php');
?>