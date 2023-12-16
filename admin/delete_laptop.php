<?php
session_start();
if ($_SESSION['is_admin_login'] != true) {
    header('location: admin_login.php');
}
include('./../db_conf/connection.php');
$id = $_GET['id'];
$sel="SELECT * FROM tbl_laptops WHERE id=$id";
$query=mysqli_query($connection,$sel);
$row=mysqli_fetch_assoc($query);
if ($id != null) {
    unlink("./images/laptops/" .$row['product_img']);
    $delete = "DELETE FROM tbl_laptops WHERE id=$id";
    $delete_query = mysqli_query($connection, $delete);
}
header('location:laptop_list.php');
